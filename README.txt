# HOW TO EDIT ANGULAR CSS STYLE
# FOR MAC OS USERS ONLY

Step 1 - Installa HomeBrew (se non hai già installato Node.js)
Da console copia e incolla il seguente comando:

/usr/bin/ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"

# per ulteriori info visita: https://brew.sh/index_it
... attendi che finisca e vai allo step 2

Step 2 - Installa Node.js
Da console copia e incolla il seguente comando:

brew install node

# per ulteriori informazioni visita: https://www.dyclassroom.com/howto-mac/how-to-install-nodejs-and-npm-on-mac-using-homebrew
... attendi che finisca e vai allo step 3

Step 3 - Installa @angular/cli
Da console copia e incolla il seguente comando:

npm install -g @angular/cli

# per ulteriori infomazioni visita: https://cli.angular.io/

Step 4 - Guardare le modifiche allo stile prima di andare live
Entra nella cartella del progetto angular fornita con:

cd <path/to/project_folder>

e da console copia e incolla il seguente comando:

ng serve

... quando ha finito di avviare l'app in runtime apri un browser e vai all'indirizzo:

http://localhost:4200

man mano che apporti le modifiche ai file .css del singolo component, vedrai le modifiche direttamente su questa url

Step 5 - Caricamento finale su server
Finite le modifiche digita ctrl-C da tastiera sulla console per interrompere la web app di Angular e sempre dentro la cartella del progetto digita il seguente comando:

ng build

... finita la compilazione, nella cartella del progetto sarà stata creata una cartella "dist" che contiente la web app eseguibile.
Dentro la cartella "dist" cerca il file "index.html" e dove c'è il tag <base href="/">, cambialo con <base href="/<nome cartella di destinazione su server>/">
Es. se la cartella di destinazione sul server si chiama "results", allora il mio tag base sarà <base href="/results/">
Fatto ciò, salva la modifica e trascina tutti i file all'interno della cartella dist/<nome progetto> dentro la cartella di destinazione sul server