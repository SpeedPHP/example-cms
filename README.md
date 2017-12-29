## CMS系统示例

- 本例是新版speedphp框架例子，包含了CMS（内容管理系统）的大部分功能。
- 特色在于准备好了原始页面（跟真实开发场景一致），让开发者可以逐步自行开发和参照，以便更深入体会开发过程。

### 有不明白的地方怎么办？

- 到本程序专用疑难问答帖子查阅和提问：[http://www.speedphp.com/thread-5101-1-1.html](http://www.speedphp.com/thread-5101-1-1.html)
- 代码相应的教程在制作中，敬请期待。

### 功能

功能分成四部分，一步步实现。也可以直接看Part4，那是有全部功能的例子。

#### Part 1

- 前台页面显示主页、分类页、文章页。
- 后台管理页。
- 后台管理可管理分类和文章。
- 可视化文章编辑器xheditor。

#### Part 2

- 全局HTML生成
- 发布和编辑文章时，会重新生成HTML

#### Part 3

- 权限和权限组
- 用户登录权限控制及用户管理

#### Part 4

- 图片上传
- 模板在线修改

### 配件

1. 编辑文章使用xheditor编辑器。
2. 界面使用Boostrap 3。
3. JS库使用jQuery。
4. 使用CodeMirror作为在线代码编辑器。

### 如何开始

1. ```material```目录是原始页面，和数据库SQL文件。
2. ```src```目录是现成源码。
3. 导入数据库SQL。
4. 最好下载最新版本的```speed.php```文件，替换```src/protected/lib```目录的```speed.php```文件以保证最新特性能够支持。
