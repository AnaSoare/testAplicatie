---------------- CONFIGURARE ------------------------
1.Fisierele din root trebuie sa aiba urmatoarea structura:
- assets
- framework
- protected
- public
- favicon.ico
- index.php


2. Se schimba conexiunea la baza de date in fisierul "protected/common/config/devel.php"

			'db' => array(
				'connectionString' => 'mysql:host=localhost; dbname=DB_NAME',
				'emulatePrepare' => true,
				'username' => 'DB_USER',
				'password' => 'DB_PASSWORD',
				'charset' => 'utf8',

				//'enableProfiling' => true,
				//'enableParamLogging' => true,
			),



3. Cont de test aplicatie(rol manager)
User: ana_maria.sora@yahoo.com
Password: test
