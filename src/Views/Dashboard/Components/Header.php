<head>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif; /* Parem font */
        }

        header {
            background-color: #242526; /* Tume taust */
            display: flex;
            align-items: center; /* Joondab elemendid vertikaalselt keskele */
            padding: 0 16px; /* FB standard padding */
            justify-content: space-between; /* Hoiab vasaku ja keskmise osa eraldi */
            height: 56px; /* FB päise kõrgus */
            border-bottom: 1px solid #3e4042; /* Peenike joon all */
        }

        /* --- VASAK POOL --- */
        #vasakpool {
            display: flex;
            align-items: center;
        }

        header #vasakpool img {
            height: 40px; /* FB logo suurus */
            cursor: pointer;
        }   

        .input-icon {
            position: relative;
            display: flex;
            align-items: center;
            margin-left: 10px;
        }

        .input-icon .fa-icon {
            position: absolute;
            left: 12px;
            height: 18px; /* Luubi suurus */
            pointer-events: none; /* Et ikoon ei segaks klikkimist */
            /* Kui su luubi ikoon on must, teeb see selle halliks: */
            filter: invert(0.6); 
        }

        header #vasakpool input {
            background-color: #3A3B3C; /* Sisestuskasti taust */
            border: 0;
            padding-left: 45px; /* Jätab ruumi ikoonile */
            font-size: 15px;
            border-radius: 50px; /* Täiesti ümar */
            height: 40px;
            width: 240px;
            color: #e4e6eb; /* Teksti värv */
            outline: none; /* Eemaldab sinise kasti klikkides */
        }

        /* --- KESKMINE OSA --- */
        #keskel {
            display: flex;
            justify-content: center; /* Tsentreerib nupud */
            height: 100%; /* Võtab päise kõrguse */
        }

        #keskel button {
            background: transparent;
            border: none;
            padding: 0 30px; /* Laius nuppude vahel */
            cursor: pointer;
            height: 100%;
            border-bottom: 3px solid transparent; /* Et nupp ei hüppaks aktiveerimisel */
            transition: background 0.2s;
            border-radius: 8px; /* hover-efekti ümarus */
            margin: 4px 2px; /* Pisike vahe, et hover-taust oleks ilus */
        }

        #keskel button:hover {
            background-color: #3a3b3c; /* Tumedam taust hiirega peale minnes */
        }

        /* Aktiivse nupu stiil (koduikoon) */
        #keskel button.active {
            border-bottom: 3px solid #0866ff; /* FB sinine joon all */
            border-radius: 0;
        }

        /* See osa teeb ikoonid heledaks */
        #keskel button img {
            height: 28px; /* Ikooni suurus */
            /* MUUDATUS SIIN: Inverteerib musta valgeks/heledaks */
            filter: invert(0.9) brightness(1.1); 
        }

        /* Aktiivse nupu ikoon saab sinise varjundi */
        #keskel button.active img {
             filter: invert(0.5) sepia(1) saturate(5) hue-rotate(175deg);
        }

        /* --- PAREM POOL --- */
        #paremal {
            display: flex;
            align-items: center;
            gap: 8px; /* Vahe nuppude vahel */
        }

        /* FB parempoolsed nupud on tavaliselt ümmargused ja halli taustaga */
        #paremal button {
            background-color: #3a3b3c;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            padding: 0;
        }


        #paremal button:hover {
            background-color: #4e4f50;
        }

        #paremal button img {
            height: 20px;
        }


        /* Profiilipilt on erand */
        #paremal .pfp-btn {
            background: none;
        }

        #paremal .pfp-btn img {
            height: 40px;
            width: 40px;
            border-radius: 50%;
            object-fit: cover;
            filter: none; /* Ei inverteeri pilti */
        }
    </style>
</head>

<header>
    <div id="vasakpool">
        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b8/2021_Facebook_icon.svg" alt="Facebook Logo">
        <div class="input-icon">
            <img class="fa-icon" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='black' d='M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z'/%3E%3C/svg%3E" alt="">
            <input type="text" name="search" id="search" placeholder="Otsi Facebookist">
        </div>
    </div>

    <div id="keskel">
        <button class="active"><img src="./images/icons/icon-park-solid_home.svg" alt=""></button>
        <button><img src="./images/icons/mingcute_youtube-fill.svg" alt=""></button>
        <button><img src="./images/icons/circum_shop.svg" alt=""></button>
        <button><img src="./images/icons/Group_2.svg" alt=""></button>
        <button><img src="./images/icons/codicon_game.svg" alt=""></button>
    </div>

    <div id="paremal">
        <button title="Menüü"><img src="./images/parempoolne/Group_3.svg" alt=""></button>
        <button id="messenger" title="Messenger"><img src="./images/parempoolne/jam_message-alt.svg" alt=""></button>
        <button title="Teavitused"><img src="./images/parempoolne/clarity_bell-solid.svg" alt=""></button>
        <button class="pfp-btn" title="Konto"><img src="./images/parempoolne/pfp.png" alt=""></button>
    </div>
</header>