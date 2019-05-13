from flask import Flask
from flask import request
app = Flask(__name__)

@app.route('/', methods=['GET'])
def predict():
    print(request.args.get('filepath', None))
    filepath = request.args.get('filepath', None)
    return '\n'.join([filepath] * 5)
