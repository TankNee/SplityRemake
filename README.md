### Splity-Remake



**基于 Splity 主题创建的 typecho 主题**



#### iPhone Mode



![iPhone Mode](https://img.tanknee.cn/blogpicbed/2020/04/20200420bc3bd736315c6.png)



#### Mac Mode



![Mac Mode](https://img.tanknee.cn/blogpicbed/2020/04/202004201754a645f91af.png)



#### iPad Mode



![iPad Mode](https://img.tanknee.cn/blogpicbed/2020/04/202004209d02085c835e1.png)



#### 当前版本（Date：2020-04-15） 0.0.2



主题介绍文章: [Splity-Remake](https://tanknee.cn/2020/04/15/splity-remake)



主题演示地址-1：[归舟棹远](https://tanknee.cn)

主题演示地址-2：[水止舟停](https://neeto.cn)



主题国内下载地址：[Gitea](https://git.tanknee.cn/tanknee/Splity-Remake)



主题安装方法：



```
  1.下载master分支的所有内容

  2.上传至typecho的themes文件夹下,解压压缩包，并将文件夹重命名为splity ->极其重要，请勿忘记，否则可能出错

  3.前往主题配置页面配置个人信息

```



#### 可能出现的问题：

-  安装失败

> 这类问题请提 issue 或者重新按照安装方法走一遍

-  没有权限

> 请给主题文件夹 777 的权限，一般不会报这个错了

-  emoji 评论失败

> 更改`config.inc.php`文件，将数据库编码格式改为`utfmb4`

> 执行以下语句

```sql
alter table typecho_comments convert to character set utf8mb4 collate utf8mb4_unicode_ci;

alter table typecho_contents convert to character set utf8mb4 collate utf8mb4_unicode_ci;

alter table typecho_fields convert to character set utf8mb4 collate utf8mb4_unicode_ci;

alter table typecho_metas convert to character set utf8mb4 collate utf8mb4_unicode_ci;

alter table typecho_options convert to character set utf8mb4 collate utf8mb4_unicode_ci;

alter table typecho_relationships convert to character set utf8mb4 collate utf8mb4_unicode_ci;

alter table typecho_users convert to character set utf8mb4 collate utf8mb4_unicode_ci;

```

#### 致谢：

主题原作者：[小灯泡设计](https://www.dpaoz.com/)

主题原作地址：[Splity](https://www.dpaoz.com/4)