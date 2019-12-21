index.php   入口文件
framework   框架目录
    common:放置的是框架的函数
    config:放置的是框架的配置文件
    core:框架的核心文件
application  项目的目录


App.class.php  app类，相当于一个容器

加载文件的流程
index.php
bootstrap.php
App.class.php--run()---Route::init();
