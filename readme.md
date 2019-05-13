<p align="center">
<svg viewBox="328 355 335 276" xmlns="http://www.w3.org/2000/svg" width="100" height="150">
  <path d="
    M 630, 425
    A 195, 195 0 0 1 331, 600
    A 142, 142 0 0 0 428, 570
    A  70,  70 0 0 1 370, 523
    A  70,  70 0 0 0 401, 521
    A  70,  70 0 0 1 344, 455
    A  70,  70 0 0 0 372, 460
    A  70,  70 0 0 1 354, 370
    A 195, 195 0 0 0 495, 442
    A  67,  67 0 0 1 611, 380
    A 117, 117 0 0 0 654, 363
    A  65,  65 0 0 1 623, 401
    A 117, 117 0 0 0 662, 390
    A  65,  65 0 0 1 630, 425
    Z"
    style="fill:#3BA9EE;"/>
</svg>
</p>
<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## 关于本项目

数字图像处理是北京大学信息科学技术学院的一门课。
本项目是该课的大作业。
使用了以下技术:

- [Bilinear-CNN](https://www.cv-foundation.org/openaccess/content_iccv_2015/papers/Lin_Bilinear_CNN_Models_ICCV_2015_paper.pdf).
- [laravel](https://laravel.com).

## 特征提取 对象检测 部件检测
Bilinear-CNN是一种细粒度分类方法，其主要思想是结合不同维度特征进行分类，既保留全局特征也能反映局部细微特征。
<p align="center"><img src="http://vis-www.cs.umass.edu/bcnn/docs/teaser-bcnn.png"></p>
如图所示，Bilinear分别利用两个CNN提取不同维度特征，使用bilinear pooling聚合两个特征，最后使用多分类器实现分类。

其中，我们使用了两个 [VGG-16](https://arxiv.org/pdf/1409.1556.pdf) 提取图像特征，用2层softmax进行分类。

因为Bilinear-CNN能够很好地提取到图片的部件特征，并没有使用对象检测和部件检测。

## 特征提取

我们尝试使用了VGG输出、bilinear pooling输出、softmax输出作为分类特征，最终在使用bilinear pooling特征时有最高的mAP。

## 相似度计算

我们尝试使用了sigmoid、cosine similarity、Euclidean distance计算相似度。综合计算速度和准确率，三者效果差不多。

## mAP结果

**mAP@1=60**

**mAP@50=65**

## UI界面

界面使用web网页，使用laravel+jQuery实现了浏览和查询的功能。

## 使用方法

首先安装
- `torch>=1.0`
- `php>7`
- `composer`
- `flask`
- `mysql>=5.7`

下载项目:

```shell
git clone git@github.com:Littlebus/digital_image_processing_homework.git
cd digital_image_processing_homework
composer install
```
之后需要配置数据库:
```shell
cp .env.example .env
vim .env
```
接下来分别运行服务:
```
digital_image_processing_homework:user>php artisan serve
digital_image_processing_homework/flask>FLASK_APP=server flask run
```
最后访问`http://127.0.0.1:8000`即可。

## 部署
使用uWSGI，nginx等部署。

## 协议

本项目基于以下开源协议 [MIT license](https://opensource.org/licenses/MIT).