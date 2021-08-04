## 接続先  
http://localhost:8573/  

## バージョン  
Laravel : 8.52.0  

## 参考動画  
[ドットインストール](https://dotinstall.com/lessons/basic_laravel_v3)

## パス  
C:\Users\yanag\Documents\code\Laravel\MyBBS

## コマンド(WSLで実行)  

- Laravel環境  インストール
curl -s "https://laravel.build/MyBBS" | bash  

- コンテナ起動  
./vendor/bin/sail up -d  

- コントローラー作成  
./vendor/bin/sail artisan make:controller PostController  

- mysql接続  
./vendor/bin/sail mysql mybbs  

- マイグレーションファイル作成  
./vendor/bin/sail artisan make:migration create_posts_table

- マイグレーションファイルのupメソッド実行(DBへ登録)  
./vendor/bin/sail artisan migrate

- モデル作成  
./vendor/bin/sail artisan make:model Post  

- 対話シェルコマンド  
./vendor/bin/sail tinker  

- Requestクラス作成(バリテーションチェック)  
./vendor/bin/sail artisan make:request PostRequest  

- モデル、マイグレーション、コントローラーを一度に作る  
./vendor/bin/sail artisan make:model Comment -mc
