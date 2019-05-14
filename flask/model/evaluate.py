import numpy as np
import os
from model.bilinear_cnn_fc import BCNNManager,prepare_trained_model,classify_image,wrap_image
import pickle

from sklearn.externals import joblib

def generate_feature_file(manager,path,data_type):
    if os.path.exists(path):
        print('feature file already exists')
        return
    image_dir = os.path.join(os.path.dirname(os.getcwd()),'data/cub200/raw/CUB_200_2011/images')
    #print(image_dir)
    image_list = np.genfromtxt(os.path.join(os.path.dirname(image_dir),'images.txt'),dtype=str)
    train_test_split = np.genfromtxt(os.path.join(os.path.dirname(image_dir),'train_test_split.txt'),dtype=str)
    record_list = []
    count = 0
    
    for line in image_list:
        index = int(line[0]) - 1
        
        assert index >=0 and index < len(train_test_split),(index, len(train_test_split))
        if int(train_test_split[index][1]) != data_type:
            continue
        print(index)
        count += 1
        label = int(line[1][0:3]) - 1
        assert label >= 0 and label < 200
        img_path = os.path.join(image_dir,line[1])
        img_tensor = wrap_image(img_path)
        
        fc_feature = manager.fc_feature(img_tensor)
        
        norm_feature = manager.norm_feature(img_tensor)
        record = dict()
        record['id'] = index
        record['fc_feature'] = fc_feature
        record['norm_feature'] = norm_feature
        record['softmax_feature'] = manager.softmax_feature(img_tensor)
        record_list.append(record)
    assert count == len(record_list)
    print('Total {} images'.format(count))
    #print(record_list[0][0])
    
    joblib.dump(record_list,path)
    

def generate_id_label_ref():
    if os.path.exists('model/id2label.pkl'):
        id2label = pickle.load(open('model/id2label.pkl','rb'))
        return id2label
    parent_dir = os.path.dirname(os.getcwd())
    file_path = os.path.join(parent_dir,'data/cub200/raw/CUB_200_2011/image_class_labels.txt')
    data = np.genfromtxt(file_path,dtype=str)
    result = []
    for line in data:
        result.append(int(line[1]) - 1)
    #print(result[-10:])
    pickle.dump(result,open('model/id2label.pkl','wb'))
    return result


    
def fetch_candidates(total_features,id_label_ref,label=-1):
    assert label >=-1 and label < 200, 'invalid label'
    if label == -1:
        return total_features
    else:
        result = [elem for elem in total_features if id_label_ref[elem['id']] == label]
        return result

def sigmoid(x):
    s = 1 / (1 + np.exp(-x))
    return s

def cos_dist(a,b):
    len_a = np.sqrt(np.dot(a,a))
    len_b = np.sqrt(np.dot(b,b))
    return np.dot(a,b)/(len_a*len_b)

def euc_dist(a,b):
    c = a - b
    return np.dot(c,c)
def feature_match(var,candidate,manager,feat_type,dist_type):
    dist = []
    assert feat_type =='fc' or feat_type == 'norm' or feat_type == 'concat' or feat_type == 'softmax'
    assert dist_type == 'sigmoid' or dist_type == 'cos' or dist_type == 'euc'
    if feat_type == 'fc':
        var_feat = manager.fc_feature(var)
    elif feat_type == 'norm':
        var_feat = manager.norm_feature(var)
    elif feat_type == 'concat':
        var_feat = np.concatenate((manager.fc_feature(var),manager.norm_feature(var)))
    else:
        var_feat = manager.softmax_feature(var)

    
    for elem in candidate:
        dist_elem = dict()
        dist_elem['id'] = elem['id']
        if feat_type == 'fc':
            candi_feat = elem['fc_feature']
        elif feat_type == 'norm':
            candi_feat = elem['norm_feature']
        elif feat_type == 'concat':
            candi_feat = np.concatenate((elem['fc_feature'],elem['norm_feature']))
        else:
            candi_feat = elem['softmax_feature']
        if dist_type == 'sigmoid':
            dist_elem['distance'] = sigmoid(np.dot(var_feat,candi_feat))
        elif dist_type == 'cos':
            dist_elem['distance'] = cos_dist(var_feat,candi_feat)
        else:
            dist_elem['distance'] = euc_dist(var_feat,candi_feat)
        dist.append(dist_elem)
    return dist

def get_top_n(dist_list,n,dist_type):
    assert dist_type == 'sigmoid' or dist_type == 'cos' or dist_type == 'euc'
    if dist_type == 'sigmoid':
        dist_list.sort(key=lambda x:x['distance'],reverse=True)
    elif dist_type == 'cos':
        dist_list.sort(key=lambda x:x['distance'],reverse=True)
    else:
        dist_list.sort(key=lambda x:x['distance'],reverse=False)
    return [elem['id'] for elem in dist_list[:n]]

def generate_id_path_ref():
    if os.path.exists('model/id2path.pkl') and os.path.exists('model/path2id.pkl'):
        id2path = pickle.load(open('model/id2path.pkl','rb'))
        path2id = pickle.load(open('model/path2id.pkl','rb'))
        return id2path,path2id
    image_list = np.genfromtxt(os.path.join(os.path.dirname(os.getcwd()),'data/cub200/raw/CUB_200_2011/images.txt'),dtype=str)
    id2path = [elem[1] for elem in image_list]
    path2id = dict()
    for elem in image_list:
        path2id[elem[1]] = int(elem[0]) - 1
    pickle.dump(id2path,open('model/id2path.pkl','wb'))
    pickle.dump(path2id,open('model/path2id.pkl','wb'))
    return id2path,path2id
    



def evaluate_ap(img_id,id_path_ref,id_label_ref,total_feat,manager,feat_type,dist_type,N):
    image_dir = os.path.join(os.path.dirname(os.getcwd()),'data/cub200/raw/CUB_200_2011/images')
    image_path = os.path.join(image_dir,id_path_ref[img_id])
    X = wrap_image(image_path)
    #pred_label = classify_image(manager,image_path)
    #print(id_label_ref[500:510])
    #print('path: {},pred: {}, true: {}'.format(id_path_ref[img_id],pred_label,id_label_ref[img_id]))

    cand = fetch_candidates(total_feat,id_label_ref)
    assert len(cand) > 0
    dist = feature_match(X,cand,manager,feat_type,dist_type)
    choose_id = get_top_n(dist,N,dist_type)
    correct_count = 0
    ap = float(0)
    for i in range(len(choose_id)):
        l_k = 0
        if id_label_ref[img_id] == id_label_ref[choose_id[i]]:
            correct_count += 1
            l_k = 1
        p_k = float(correct_count)/float(i+1)
        ap += p_k * l_k
    if correct_count == 0:
        return 0
    else:
        return ap/float(correct_count)

def evaluate_test_map(model_path,feat_type,dist_type,N):
    id2path,path2id = generate_id_path_ref()
    #print(id2path[-10:])
    id2label = generate_id_label_ref()
    #print(id2label[-10:])
    manager, class_list = prepare_trained_model(model_path)
    generate_feature_file(manager,'train_features',1)
    total_feat = joblib.load('train_features')
    map_list = []
    train_test_split = np.genfromtxt(os.path.join(os.path.dirname(os.getcwd()),'data/cub200/raw/CUB_200_2011/train_test_split.txt'),dtype=str)
    for i in range(len(train_test_split)):
        if train_test_split[i][1] == '1':
            continue
        print(i)
        ap = evaluate_ap(i,id2path,id2label,total_feat,manager,feat_type,dist_type,N)
        map_list.append(ap)
    map_np = np.array(map_list,dtype=np.float32)
    return np.average(map_np)

def test_model_acc(model_path):
    manager, class_list = prepare_trained_model(model_path,test=False)
    acc = manager._accuracy(manager._test_loader)
    print(acc)


def predict_and_evaluate_single(img_path,total_feat,path_id_ref,id_path_ref,id_label_ref,manager,feat_type,dist_type):
    img_name = os.path.basename(img_path)
    img_parent = os.path.basename(os.path.dirname(img_path))
    X = wrap_image(img_path)
    cand = total_feat
    dist = feature_match(X,cand,manager,feat_type,dist_type)
    choose_id = get_top_n(dist,50,dist_type)
    choose_path = [id_path_ref[_id] for _id in choose_id]
    assert img_name in path_id_ref,img_name
    img_id = path_id_ref[img_name]

    if id_label_ref[img_id] != id_label_ref[choose_id[0]]:
        ap_1 = 0
    else:
        ap_1 = 1

    correct_count = 0
    ap = float(0)
    for i in range(len(choose_id)):
        l_k = 0
        if id_label_ref[img_id] == id_label_ref[choose_id[i]]:
            correct_count += 1
            l_k = 1
        p_k = float(correct_count)/float(i+1)
        ap += p_k * l_k
    if correct_count == 0:
        ap_50 = 0
    else:
        ap_50 = ap/float(correct_count)
    return choose_path, ap_1, ap_50



if __name__ == '__main__':
    model_path = '../model/vgg_16_epoch_32.pth'
    img_path = 'E:/DigitImageProcessing/bilinear-cnn-master/bilinear-cnn-master/data/cub200/raw/CUB_200_2011/images/002.Laysan_Albatross/Laysan_Albatross_0001_545.jpg'
    feat_type ='norm'
    dist_type = 'cos'
    '''
    score_50=evaluate_test_map(model_path,'softmax','euc',50)
    score_10=evaluate_test_map(model_path,'softmax','euc',10)
    score_5=evaluate_test_map(model_path,'softmax','euc',5)
    score_1=evaluate_test_map(model_path,'softmax','euc',1)
    f=open('map_log.txt','w')
    f.write('map of top 1: '+ str(score_1)+'\n')
    f.write('map of top 5: '+ str(score_5)+'\n')
    f.write('map of top 10: '+ str(score_10)+'\n')
    f.write('map of top 50: '+ str(score_50)+'\n')
    f.close()
    print('Evaluation done')
    '''
    
    manager,class_list = prepare_trained_model(model_path)
    generate_feature_file(manager,'train_features',1)
    total_feat=joblib.load('train_features')
    id2path,path2id = generate_id_path_ref()
    id2label = generate_id_label_ref()
    choose_path,ap_1,ap_50 = predict_and_evaluate_single(img_path,total_feat,path2id,id2path,id2label,manager,feat_type,dist_type)
    print (choose_path[0:10])
    print(ap_1)
    print(ap_50)




    
        
    
    
    

    

    
    


    
    
    
    

    
    
    

    
    