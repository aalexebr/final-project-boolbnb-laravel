<?php
return [
    // es indirizzo PREFERIBILMENTE INDIRIZZI NELLA VOSTR CITTA ENTRO 20-35km distanza l'uno dall'altro
    // (so che non serve l'array di array associativi ma è più ordinato visivamente per noi scriverli)
    /*
        vanno inseriti a mano inoltre lat e lon
        dovete fare una chiamata axios su postman del vostro indirizzo al tomtom con la vostra APIKEY
        indirizzo e APIKEY sono params della chiamata url di tomtom
        e nella risposta json avrete i campi latitudine e longitudine da inserire
        https://api.tomtom.com/search/2/geocode/INDIRIZZO.json?&key=KEiNGuhsySt5PgvkmCw7C9Sb5vGdacR6
        nella risposta json trovate 'position' e avete lat e lon
        in modo alternativo potete andare su laravel inserire indirizzo e andare nel db a ricavarvi lat e lon che usa la stessa funzione della chiamata a tomtom
    */
    // esempio, attenetevi ai tipi delle colonne nella tabella del db
    // 7 indirizzi STEFANO
    [
    'address' => 'Vico di Pellicceria, 16124 Genova GE, Italia',
    'lat' => '44.4109216',
    'lon' => '8.9302048',
    'cover_img'=> '/apt_img/attico.webp',
    'name'=>'Attico esclusivo Centro Storico',
    'bed'=>2,
    'room' => 1,
    'bathroom'=>1,
    'shared_bathroom'=>0,
    'description'=> "Rilassati e ricaricati in quest'oasi di quiete ed eleganza. Attico lussuoso privato con terrazza e jacuzzi uso esclusivo affacciato sul museo di Pelliceria, a due passi dall'Acquario e dal Porto Antico nel cuore del Centro Storico di Genova.
    Appartamento nuovo arredato con ricercatezza e marchi importanti e dotato di ogni confort, il palazzo d'interesse storico-artistico è stato completamente ristrutturato ed è dotato di ascensore, palestra condominiale e zona relax",
    'visible'=>1,
    'price'=> 99,
    'square_meter'=> 150,

],
[
    'address' => 'Corso Torino, 16129 Genova GE, Italia',
    'lat' => '44.4009445',
    'lon' => '8.9501701',
    'cover_img'=> '/apt_img/mansarda.webp',
    'name'=>'La mansarda in centro - Parcheggio gratuito',
    'bed'=>2,
    'room' => 1,
    'bathroom'=>1,
    'shared_bathroom'=>0,
    'description'=>'Casa Savò è una deliziosa mansarda sita nel cuore di Genova, ristrutturata ed arredata con cura e dotata di ogni comfort.
    Inoltre , offre ai nostri ospiti la possibilità di parcheggiare gratuitamente in tutta la BLU AREA (NO ISOLA AZZURRA) presente nella zona limitrofa all’appartamento (zona A e B indicata , in alto , sui cartelli presenti vicino ai parcheggi )',
    'visible'=>1,
    'price'=>86,
    'square_meter'=>120,

],
[
    'address' => "Stradone Sant'Agostino, 16123 Genova GE, Italia",
    'lat' => '44.4048975',
    'lon' => '8.9312798',
    'cover_img'=> '/apt_img/acquario.webp',
    'name'=>'(Acquario) Luminoso ed Elegante Alloggio in Centro',
    'bed'=>4,
    'room' => 3,
    'bathroom'=>2,
    'shared_bathroom'=>0,
    'description'=>"Elegante e luminoso appartamento situato nel cuore di Genova a soli 10 minuti a piedi dall’Acquario e 5 minuti da Piazza De Ferrari

    Trovandosi all'ultimo piano l'appartamento gode di un’ottima esposizione alla luce naturale e grazie alle numerose finestre vi farà vivere appieno la bellezza del centro città.
    
    Si informa che NON è presente l'aria condizionata.",
    'visible'=>1,
    'price'=>79,
    'square_meter'=>95,

],
[
    'address' => 'Via ai Cuochi, 16010 Manesseno GE, Italia',
    'lat' => '44.4782046',
    'lon' => '8.9235433',
    'cover_img'=> '/apt_img/oasi.webp',
    'name'=>"Oasi nel verde vicino alla città'",
    'bed'=>1,
    'room' => 1,
    'bathroom'=>1,
    'shared_bathroom'=>0,
    'description'=>"Vicino a Villa Serra di Comago, in contesto privato, nuovo e soleggiato bilocale in villa. con zona notte, zona giorno angolo cottura, divano letto, camino, soffitti affrescati terrazza e giardino . Raggiungibile in auto, vicino all' A7 uscita Genova Bolzaneto (3km). Dista circa 15 km dal centro di Genova. Mezzi pubblici e negozi a circa 500mt a piedi . Ideale per chi viaggia in auto, in moto, o per lavoro, con parcheggio gratuito per auto a pochi metri e moto in giardino carrabile e privato.",
    'visible'=>1,
    'price'=>37,
    'square_meter'=>85,

],
[
    'address' => 'Via Padre Attilio Garrè, 16015 San Bartolomeo GE, Italia',
    'lat' => '44.5407936',
    'lon' => '8.9832149',
    'cover_img'=> '/apt_img/terrazza.webp',
    'name'=>'La Terrazza',
    'bed'=>1,
    'room' => 1,
    'bathroom'=>1,
    'shared_bathroom'=>0,
    'description'=>"Delizioso monolocale immerso nel verde e affacciato su una loggia privata, tranquillo, semplice, accogliente e luminoso.
    Dotato di grande terrazza ideale per godere del fresco estivo.
    Possibilità di piacevoli passeggiate nel piccolo borgo in cui e' situato.
    Si trova a poco più di 1 km dal vivace paesino di Casella e dal suo caratteristico centro storico.",
    'visible'=>1,
    'price'=>50,
    'square_meter'=>68,

],
[
    'address' => 'Via San Felice, 16138 Genova GE, Italia',
    'lat' => '44.463835',
    'lon' => '8.9930824',
    'cover_img'=> '/apt_img/giardino.webp',
    'name'=>'Appartamento in casa indipendente con giardino',
    'bed'=>6,
    'room' => 1,
    'bathroom'=>1,
    'shared_bathroom'=>0,
    'description'=>"Rilassati con tutta la famiglia in questo alloggio tranquillo in mezzo al verde. A 20 min.dal centro, mare, acquario; 35 con bus. 5 min.piscine Sciorba. Ampio appartamento in casa indipendente con grande giardino a disposizione, veranda con barbecue e terrazzo. Si accede da cancello automatico con posto auto privato. Esposizione a sud con sole tutto il giorno. Zona tranquilla e comoda. Adatto a famiglie con bambini. Ammessi animali. Possibile 5^letto e/o lettino",
    'visible'=>1,
    'price'=>66,
    'square_meter'=>96,

],
[
    'address' => 'Via della Torrazza, 16157 Genova GE, Italia',
    'lat' => '44.4297463',
    'lon' => '8.7879039',
    'cover_img'=> '/apt_img/bis.webp',
    'name'=>'La casa dei Bis',
    'bed'=>2,
    'room' => 1,
    'bathroom'=>1,
    'shared_bathroom'=>0,
    'description'=>"Rilassati con tutta la famiglia in questo alloggio tranquillo.
    Poco distante dalla stazione di Genova Pra' , potrai raggiungere facilmente il centro città o le splendide spiagge della riviera ligure.
    L' appartamento è composto da cucina abitabile, bagno spazioso con doccia e lavatrice, dispensa e una grande camera con letto matrimonaile e divano letto, con openspace sulla cucina. Parcheggio condominiale.",
    'visible'=>1,
    'price'=>55,
    'square_meter'=>120,

],
    // 7 indirizzi Ale M
   [
        'address' => 'Via Festo Porzio Roma',
        'lat' => '41.8551101',
        'lon' => '12.5642376',
        'cover_img'=> '/apt_img/roma1.webp',
        'name'=>'Appartamento Appio Claudio',
        'bed'=>4,
        'room' => 1,
        'bathroom'=>1,
        'shared_bathroom'=>0,
        'description'=>'Luminoso appartamento nel cuore del quartiere Appio Claudio, situato in una delle zone più vivaci e desiderabili di Roma. Questa residenza incantevole offre una combinazione perfetta di eleganza moderna e comfort accogliente.',
        'visible'=>1,
        'price'=>86.99,
        'square_meter'=>60,

    ],
   [
        'address' => 'Via Quintilio Varo Roma',
        'lat' => '41.8535667',
        'lon' => '12.5651807',
        'cover_img'=> '/apt_img/roma2.webp',
        'name'=>'Appartamento Terrace Rome',
        'bed'=>3,
        'room' => 2,
        'bathroom'=>2,
        'shared_bathroom'=>1,
        'description'=>'Il Terrace, è’ stato recentemente ristrutturato, offre un salone con cucina a vista che da accesso direttamente sul terrazzo principale, che ti permetterà di poterti rilassare sorseggiando un calice di buon vino italiano, aspettando il tramonto. ',
        'visible'=>1,
        'price'=>100.00,
        'square_meter'=>90,

    ],
   [
        'address' => 'Via Tuscolana Roma',
        'lat' => '41.8385832',
        'lon' => '12.5953982',
        'cover_img'=> '/apt_img/roma3.webp',
        'name'=>'Can Pier Rome Apartment',
        'bed'=>4,
        'room' => 3,
        'bathroom'=>2,
        'shared_bathroom'=>0,
        'description'=>'Rilassati con tutta la famiglia in questo alloggio tranquillo, breve soggiorno a Roma in un appartamento con entrata indipendente dotato di tutti i confort, parcheggio auto gratuito nelle immediate vicinanze, tv, aria condizionata, WiFi, bagno, Lavatrice, cucina.',
        'visible'=>1,
        'price'=>210.50,
        'square_meter'=>120,

    ],
   [
        'address' => 'Via Di Torre Spaccata Roma',
        'lat' => '41.8683873',
        'lon' => '12.5871566',
        'cover_img'=> '/apt_img/roma4.webp',
        'name'=>'Lovely House',
        'bed'=>3,
        'room' => 3,
        'bathroom'=>2,
        'shared_bathroom'=>1,
        'description'=>'Luminoso appartamento , appena rinnovato in una zona tranquilla del quartiere Flaminio, vicina allo Stadio Olimpico,Ponte Milvio, Museo MAXXI,Stadio Flaminio e al teatro Olimpico.
        A pochi passi vi è la fermata del tram n.2 che in pochi minuti vi porterà a Piazza del Popolo da cui sarà facile raggiungere tutti i luoghi più importanti di Roma come Piazza di Spagna , Fontana di Trevi , Villa Borghese, Pantheon .',
        'visible'=>1,
        'price'=>200.00,
        'square_meter'=>80,

    ],
   [
        'address' => 'Viale Alessandrino Roma',
        'lat' => '41.8751507',
        'lon' => '12.5793874',
        'cover_img'=> '/apt_img/roma5.webp',
        'name'=>'Lotto29',
        'bed'=>1,
        'room' => 1,
        'bathroom'=>1,
        'shared_bathroom'=>0,
        'description'=>'Immerso nel verde dei lotti dello storico Quartiere della Garbatella, delizioso appartamento composto da una spaziosa camera da letto matrimoniale un salotto con divano letto matrimoniale, angolo cottura abitabile. Molto ben collegato.',
        'visible'=>1,
        'price'=>150.99,
        'square_meter'=>70,

    ],
    [
        'address' => 'Via dei Platani Roma',
        'lat' => '41.8809696',
        'lon' => '12.5699482',
        'cover_img'=> '/apt_img/roma6.webp',
        'name'=>'A casa di Laura',
        'bed'=>4,
        'room' => 3,
        'bathroom'=>2,
        'shared_bathroom'=>0,
        'description'=>'Situato nel cuore del quartiere storico di Trastevere a Roma, questo affascinante appartamento vi accoglie con il suo carattere unico e il suo fascino autentico. Appena varcata la soglia, sarete catturati in una atmosfera accogliente e dalla bellezza dei dettagli artigianali che adornano ogni angolo di questa dimora.',
        'visible'=>1,
        'price'=>300.00,
        'square_meter'=>120,

    ],
   [
        'address' => 'Via dei Castani Roma',
        'lat' => '41.8876518',
        'lon' => '12.5656648',
        'cover_img'=> '/apt_img/roma7.webp',
        'name'=>'Casetta Monteverde',
        'bed'=>5,
        'room' => 3,
        'bathroom'=>2,
        'shared_bathroom'=>1,
        'description'=>'Delizioso appartamento appena rinnovato in una zona tranquilla del quartiere Monteverde.',
        'visible'=>1,
        'price'=>120,
        'square_meter'=>90,

    ],
     // 7 indirizzi PIERPAOLO
     [
        'address' => 'Corso Duca degli Abruzzi, 10100 Torino TO, Italia',
        'lat' => '45.0672455',
        'lon' => '7.6661878',
        'cover_img' => '/apt_img/Torino1.webp',
        'name' => 'Appartamento comodo Centro-Politecnico',
        'bed' => 5,
        'room' => 2,
        'bathroom' => 1,
        'shared_bathroom' => 0,
        'description' => "Location poco distante dal centro di Torino, a pochi minuti dalla stazione ferroviaria di Porta Susa e dal Politecnico. L'appartamento è situato al piano 6 con ascensore in un tranquillo condominio, comodo ai mezzi pubblici grazie alle vicine fermate. Gode di una piacevole vista sulla collina Torinese e sul Monviso. Composto da camera con letto matrimoniale e singolo e soggiorno con divano matrimoniale, completano bagno e cucinino. Dotato di tutti i confort. Da 1 a 5 posti letto",
        'visible' => 1,
        'price' => 76,
        'square_meter' => 90

    ],
    [
        'address' => 'Via Giuseppe Garibaldi, 10140 Torino TO, Italia',
        'lat' => '45.0752476',
        'lon' => '7.6736149',
        'cover_img' => '/apt_img/Torino2.webp',
        'name' => 'Annina home - appartamento in centro',
        'bed' => 3,
        'room' => 2,
        'bathroom' => 1,
        'shared_bathroom' => 0,
        'description' => "Posizione Centrale: Situato in Via Boucheron 8/a, è circondato da ristoranti, negozi e un'atmosfera vivace. Perfetto sia per coppie che per famiglie. Con un open space moderno, letto matrimoniale, due divani letto cucina attrezzata, TV, bagno con comfort moderni e un terrazzino per relax. Wi-Fi veloce incluso.
        Contattaci per qualsiasi informazione e/o prenotazione. Siamo qui per rendere il vostro soggiorno a Torino indimenticabile!",
        'visible' => 1,
        'price' => 215,
        'square_meter' => 100

    ],
    [
        'address' => 'Piazza Solferino, Torino TO, Italia',
        'lat' => '45.0684897',
        'lon' => '7.6768194',
        'cover_img' => '/apt_img/Torino3.webp',
        'name' => 'Bilocale Lussuoso & Moderno',
        'bed' => 2,
        'room' => 1,
        'bathroom' => 2,
        'shared_bathroom' => 0,
        'description' => "Meraviglioso bilocale nel cuore pulsante di Torino a soli 700mt dalla Stazione e Metropolitana di Porta Susa.
        L'appartamento è di ultima generazione completamente domotico, perfetto per viaggi d'ogni tipo grazie alla zona Centrale completa di ogni tipologia di servizi.
        L'alloggio si trova in una posizione strategica a pochi passi da Piazza Castello e Via Garibaldi e inoltre ricca di Musei e Opere d'arte.
        La casa fa della luminosità e modernità un punto di forza.",
        'visible' => 1,
        'price' => 200,
        'square_meter' => 89

    ],
    [
        'address' => 'Piazza Vittorio Veneto, 10124 Torino TO, Italia',
        'lat' => '45.0651445',
        'lon' => '7.6948871',
        'cover_img' => '/apt_img/Torino4.webp',
        'name' => 'Verdesera',
        'bed' => 2,
        'room' => 1,
        'bathroom' => 1,
        'shared_bathroom' => 0,
        'description' => "Benvenuti a Verdesera - la vostra oasi nel cuore di Torino!
        La nostra casa è il luogo perfetto per una fuga romantica o un soggiorno rilassante in città.
        Goditi il massimo comfort in una camera completa di idromassaggio e di una moderna TV a schermo piatto davanti al letto, per trascorrere serate davvero uniche.
        Situata in una zona vivace, la casa è circondata da un'ampia varietà di negozi e a soli due passi a piedi da Piazza Statuto, dal centro storico e dai servizi della metropolitana!",
        'visible' => 1,
        'price' => 168,
        'square_meter' => 70

    ],
    [
        'address' => 'Piazza Statuto, 10140 Torino TO, Italia',
        'lat' => '45.0766195',
        'lon' => '7.6691802',
        'cover_img' => '/apt_img/Torino5.webp',
        'name' => 'Mansarda Passalacqua',
        'bed' => 3,
        'room' => 2,
        'bathroom' => 2,
        'shared_bathroom' => 0,
        'description' => '',
        'visible' => 1,
        'price' => 120,
        'square_meter' => 120

    ],
    [
        'address' => 'Via Duchessa Jolanda, 10138 Torino TO, Italia',
        'lat' => '45.0740528',
        'lon' => '7.6619328',
        'cover_img' => '/apt_img/Torino6.webp',
        'name' => '[Vicino a Porta Susa] Incredibile loft',
        'bed' => 3,
        'room' => 2,
        'bathroom' => 2,
        'shared_bathroom' => 0,
        'description' => "Meraviglioso appartamento strategicamente posizionato vicino alla stazione di Porta Susa, comodo a tutti i servizi, circondato da parcheggi sia custoditi che a pagamento. L'appartamento si trova al piano terra, perfetto per tutte le esigenze. All' interno disporrete di tutto il necessario per vivere un confortevole soggiorno per necessità lavorative (ottima connessione internet che copre tutta la casa) o di piacere data la vicinanza ad ogni punto di attrazione, un vero gioiello!",
        'visible' => 1,
        'price' => 118,
        'square_meter' => 110

    ],
    [
        'address' => 'Piazza Castello, 10123 Torino TO, Italia',
        'lat' => '45.0707357',
        'lon' => '7.6848198',
        'cover_img' => '/apt_img/Torino7.webp',
        'name' => 'Open Space Centralissimo',
        'bed' => 5,
        'room' => 1,
        'bathroom' => 1,
        'shared_bathroom' => 0,
        'description' => "Appartamento molto confortevole e ben organizzato nei suoi spazi, facilmente vivibile poichè dotato di molti confort.
        Il letto a soppalco lo rende unico nel suo genere... il luogo ideale dove rigenerarsi durante una vacanza!
        Accesso per gli ospiti
        Possibilità, su richiesta, di prenotazione di spa o ristoranti.
        Possibilità, su richiesta, di pick up da e per l'aeroporto (quota da pagare a parte).",
        'visible' => 1,
        'price' => 285,
        'square_meter' => 200
    ],
    //ALE EBRE
    [
        'address' => 'Via di Torrevecchia, 00135 Roma',
        'lat' => '41.9323565',
        'lon' => '12.4199126',
        'cover_img'=> '/apt_img/shack1.jpg',
        'name'=>'Horror House',
        'bed'=>0,
        'room' => 1,
        'bathroom'=>12,
        'shared_bathroom'=>1,
        'description'=>'Your Nightmare House, for the worst vacation ever',
        'visible'=>1,
        'price'=>80.99,
        'square_meter'=>190,

    ],
   [
        'address' => 'Via Paolo Anfossi, 72, 16164 Genova',
        'lat' => '44.498905',
        'lon' => '8.9034468',
        'cover_img'=> '/apt_img/shack2.jpg',
        'name'=>'Baracca',
        'bed'=>12,
        'room' => 1,
        'bathroom'=>1,
        'shared_bathroom'=>0,
        'description'=>'Bellissima vista sulla desolazione della tua anima',
        'visible'=>1,
        'price'=>12.99,
        'square_meter'=>640,

    ],
   [
        'address' => 'Via Cernaia, 10140 Torino',
        'lat' => '45.073553',
        'lon' => '7.6681526',
        'cover_img'=> '/apt_img/shack4.jpg',
        'name'=>'Casa da Incubo',
        'bed'=>1,
        'room' => 200,
        'bathroom'=>12,
        'shared_bathroom'=>1,
        'description'=>'Uno sguardo nel tuo futuro buio e triste',
        'visible'=>1,
        'price'=>122.26,
        'square_meter'=>120,

    ],
   [
        'address' => 'Via Tempio, 08100 Nuoro',
        'lat' => '40.3182578',
        'lon' => '9.3123027',
        'cover_img'=> '/apt_img/shack6.jpg',
        'name'=>'Morte Sarda',
        'bed'=>30,
        'room' => 1,
        'bathroom'=>40,
        'shared_bathroom'=>0,
        'description'=>'Accoglienza Sarda',
        'visible'=>1,
        'price'=>999,
        'square_meter'=>1,

    ],
   [
        'address' => 'Viale della Fauna, 09126 Cagliari',
        'lat' => '39.2104968',
        'lon' => '9.1490043',
        'cover_img'=> '/apt_img/shack24.jpg',
        'name'=>'Incubo Sardo',
        'bed'=>12,
        'room' => 1,
        'bathroom'=>1,
        'shared_bathroom'=>0,
        'description'=>'Tu speravi in una bella vacanza in Sardegna...',
        'visible'=>1,
        'price'=>1000,
        'square_meter'=>100,

    ],
   [
        'address' => 'Via del Colle, 16128 Genova',
        'lat' => '44.4038771',
        'lon' => '8.9331023',
        'cover_img'=> '/apt_img/shack234.jpg',
        'name'=>'Horror House',
        'bed'=>12,
        'room' => 5,
        'bathroom'=>1,
        'shared_bathroom'=>0,
        'description'=>'casa da incubi',
        'visible'=>1,
        'price'=>999,
        'square_meter'=>999,

    ],
   [
        'address' => 'Via Vittorio Veneto, 00187 Roma',
        'lat' => '41.9088566',
        'lon' => '12.4887586',
        'cover_img'=> '/apt_img/shak7.jpg',
        'name'=>'Exorcist House',
        'bed'=>14,
        'room' => 20,
        'bathroom'=>7,
        'shared_bathroom'=>1,
        'description'=>'Il tuo sogno di vivere la notte con il signore oscure degli inferi',
        'visible'=>1,
        'price'=>999,
        'square_meter'=>999,

    ],

];

