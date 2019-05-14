import numpy as np
import os
import pickle


def generate_class(path):
    if os.path.exists('model/class_list.pkl'):
        return pickle.load(open('model/class_list.pkl','rb'))
    data = np.genfromtxt(path,dtype=str)
    class_list = [line[1][4:] for line in data]
    assert len(class_list) == 200
    pickle.dump(class_list,open('model/class_list.pkl','wb'))
    return class_list

