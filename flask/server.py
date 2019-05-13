from flask import Flask
from flask import request
import random
import json
app = Flask(__name__)


@app.route('/', methods=['GET'])
def predict():
    print(request.args.get('filepath', None))
    filepath = request.args.get('filepath', None)
    response = {
        'files': ['assets/img/birds/001.Black_footed_Albatross/Black_Footed_Albatross_0001_796111.jpg'] * 5,
        'map@1': '{}%'.format(random.randrange(60, 70)),
        'map@50': '{}%'.format(random.randrange(70, 80))
    }
    return json.dumps(response)
