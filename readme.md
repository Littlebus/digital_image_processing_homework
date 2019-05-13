<p align="center">
<img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBzdGFuZGFsb25lPSJubyI/PjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+PHN2ZyB0PSIxNTU3NzUyNDMzMTc5IiBjbGFzcz0iaWNvbiIgc3R5bGU9IiIgdmlld0JveD0iMCAwIDEwMjQgMTAyNCIgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHAtaWQ9IjE5NjMiIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCI+PGRlZnM+PHN0eWxlIHR5cGU9InRleHQvY3NzIj48L3N0eWxlPjwvZGVmcz48cGF0aCBkPSJNOTYwIDIzNy45Yy0yNS4xIDM2LjYtNTYuMyA2OC43LTkyLjEgOTQuOSAwLjYgOCAwLjYgMTUuOSAwLjYgMjMuOSAwIDI0Mi44LTE4NC44IDUyMi41LTUyMi41IDUyMi41LTEwNCAwLTIwMC43LTMwLjEtMjgyLTgyLjUgMTQuOCAxLjcgMjkgMi4zIDQ0LjQgMi4zIDg1LjggMCAxNjQuOS0yOSAyMjgtNzguNS03OC42LTEuNC0xNDcuNS01Mi42LTE3MS43LTEyNy40IDExLjQgMS43IDIyLjcgMi44IDM0LjcgMi44IDE2LjUgMCAzMy0yLjMgNDguMy02LjMtODUuNy0xNy4zLTE0Ny4zLTkyLjctMTQ3LjMtMTgwLjJ2LTIuM2MyNS40IDE0LjIgNTMuOSAyMi4yIDgzIDIzLjMtNTEuMi0zNC4xLTgxLjktOTEuNS04MS45LTE1Mi45IDAtMzQuMSA5LjEtNjUuNCAyNS05Mi43QzIxOS44IDI5OS42IDM1Ny40IDM2OS41IDUwNS4xIDM3N2MtMi45LTEzLjgtNC41LTI3LjktNC41LTQyLjEgMC00OC43IDE5LjMtOTUuNCA1My44LTEyOS45IDM0LjQtMzQuNCA4MS4yLTUzLjggMTI5LjktNTMuOCA1MC44LTAuMSA5OS40IDIwLjkgMTM0LjIgNTggNDEuMS03LjkgODAuNi0yMi45IDExNi41LTQ0LjRBMTgzLjQ1IDE4My40NSAwIDAgMSA4NTQuMyAyNjZjMzYuOS0zLjcgNzIuNy0xMy45IDEwNS43LTI4LjF6IG0wIDAiIGZpbGw9IiMwMEFDRUQiIHAtaWQ9IjE5NjQiPjwvcGF0aD48L3N2Zz4=" alt="这只是一只鸟">
</p>

# 鸟类检索库

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

本项目基于以下开源协议 [GPL-3.0 license](https://opensource.org/licenses/GPL-3.0).