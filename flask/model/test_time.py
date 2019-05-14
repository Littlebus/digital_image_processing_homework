import numpy as np
import torch
import timeit
from sklearn.externals import joblib

data = joblib.load('train_features')
B = np.random.randn(262144,).astype(np.float32)
print('init')
print(len(data))

def multi(data,b):
    
    rs = []
    for elem in data:
        rs.append(np.dot(elem['norm_feature'],b))
    return rs
it = timeit.timeit(stmt='multi(data,B)',setup='from __main__ import multi, data,B',number=1)
print(it)
