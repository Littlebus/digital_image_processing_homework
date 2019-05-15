import os
from PIL import Image

for i in os.listdir('./public/assets/img/birds/'):
    print(i)
    if os.path.isdir('./public/assets/img/birds/{}'.format(i)) and i != '.ipynb_checkpoints':
        if not os.path.isdir('./public/assets/img/thumbnails/{}'.format(i)):
            os.makedirs('./public/assets/img/thumbnails/{}'.format(i))
        for file in os.listdir('./public/assets/img/birds/{}'.format(i)):
            with Image.open('./public/assets/img/birds/{}/{}'.format(i, file)) as img:
                img.thumbnail((100, 100))
                name = file.split('.')
                name[0] += 's'
                name = '.'.join(name)
                target_path = 'public/assets/img/thumbnails/{}/{}'.format(i, name)
                img.save(target_path)
