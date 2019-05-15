from flask import Flask
from flask import request
import random
import json
app = Flask(__name__)
from model.bilinear_cnn_fc import *
from model.evaluate import *

model_path = 'model/vgg_16_epoch_32.pth'
feat_type ='softmax'
dist_type = 'euc'
manager,class_list = prepare_trained_model(model_path)
generate_feature_file(manager,'model/train_features',1)
total_feat=joblib.load('model/train_features')
id2path,path2id = generate_id_path_ref()
id2label = generate_id_label_ref()


print('listening')
@app.route('/', methods=['GET'])
def predict():
    print(request.args.get('filepath', None))
    filepath = request.args.get('filepath', None)
    choose_path,ap_1,ap_50 = predict_and_evaluate_single(filepath,total_feat,path2id,id2path,id2label,manager,feat_type,dist_type)
    response = {
        'files': choose_path,
        'map@1': '{:.1f}%'.format(ap_1*100),
        'map@50': '{:.1f}%'.format(ap_50*100)
    }
    return json.dumps(response)
