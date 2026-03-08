<?php include __DIR__ . '/Components/Header.php' ?>

<style>
    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
        background-color: #18191a;
        color: #e4e6eb;
        font-family: Arial, sans-serif;
    }

    /* ===== LAYOUT ===== */
    .dashboard {
        display: grid;
        grid-template-columns: 360px 1fr 360px;
        gap: 0;
        padding-top: 10px; /* header kõrgus */
        min-height: 100vh;
    }

    /* ===== VASAK SIDEBAR ===== */
    .sidebar-left {
        padding: 8px 8px;
        position: sticky;
        top: 56px;
        height: calc(100vh - 56px);
        overflow-y: auto;
        scrollbar-width: none;
    }
    .sidebar-left::-webkit-scrollbar { display: none; }

    .sidebar-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 8px 12px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 15px;
        font-weight: 500;
        transition: background 0.15s;
        text-decoration: none;
        color: #e4e6eb;
    }
    .sidebar-item:hover { background: #3a3b3c; }

    .sidebar-avatar {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        object-fit: cover;
        flex-shrink: 0;
    }

    .sidebar-icon-circle {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        font-size: 18px;
    }

    .sidebar-divider {
        height: 1px;
        background: #3e4042;
        margin: 8px 12px;
    }

    .sidebar-section-title {
        padding: 8px 12px 4px;
        font-size: 17px;
        font-weight: 700;
        color: #e4e6eb;
    }

    .sidebar-item-sm {
        font-size: 15px;
        font-weight: 500;
    }

    .show-more {
        color: #e4e6eb;
        gap: 12px;
    }

    .shortcut-icon {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        object-fit: cover;
        background: #3a3b3c;
        flex-shrink: 0;
    }

    /* ===== FEED (KESKEL) ===== */
    .feed {
        padding: 24px 0;
        max-width: 680px;
        margin: 0 auto;
        width: 100%;
    }

    /* Loo postitus kast */
    .create-post {
        background: #242526;
        border-radius: 8px;
        padding: 12px 16px;
        margin-bottom: 16px;
        border: 1px solid #3e4042;
    }

    .create-post-top {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 12px;
    }

    .create-post-top img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
    }

    .create-post-input {
        flex: 1;
        background: #3a3b3c;
        border: none;
        border-radius: 20px;
        padding: 8px 16px;
        color: #b0b3b8;
        font-size: 17px;
        cursor: pointer;
        outline: none;
        text-align: left;
        width: 100%;
        transition: background 0.15s;
    }
    .create-post-input:hover { background: #4e4f50; }

    .create-post-divider {
        height: 1px;
        background: #3e4042;
        margin-bottom: 8px;
    }

    .create-post-actions {
        display: flex;
        justify-content: space-around;
    }

    .create-post-btn {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 12px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 15px;
        font-weight: 600;
        background: none;
        border: none;
        color: #b0b3b8;
        transition: background 0.15s;
    }
    .create-post-btn:hover { background: #3a3b3c; }

    .create-post-btn .icon { font-size: 20px; }

    /* Lood / Stories */
    .stories {
        display: flex;
        gap: 8px;
        margin-bottom: 16px;
        overflow-x: auto;
        scrollbar-width: none;
        padding-bottom: 4px;
    }
    .stories::-webkit-scrollbar { display: none; }

    .story-card {
        min-width: 112px;
        height: 200px;
        border-radius: 12px;
        overflow: hidden;
        position: relative;
        cursor: pointer;
        flex-shrink: 0;
        background: #3a3b3c;
    }

    .story-bg {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .story-bg-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: flex-end;
        justify-content: center;
        padding-bottom: 12px;
    }

    .story-avatar {
        position: absolute;
        top: 8px;
        left: 8px;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 3px solid #0866ff;
        object-fit: cover;
    }

    .story-name {
        position: absolute;
        bottom: 8px;
        left: 8px;
        right: 8px;
        font-size: 13px;
        font-weight: 700;
        color: white;
        text-shadow: 0 1px 3px rgba(0,0,0,0.8);
    }

    .story-create {
        background: #242526;
        border: 1px solid #3e4042;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-end;
        padding-bottom: 12px;
        gap: 8px;
    }

    .story-create-top {
        flex: 1;
        width: 100%;
        background: #3a3b3c;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .story-create-plus {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #0866ff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: white;
        font-weight: 300;
    }

    .story-create-label {
        font-size: 13px;
        font-weight: 600;
        color: #e4e6eb;
        text-align: center;
        padding: 0 8px;
    }

    /* Postitus */
    .post {
        background: #242526;
        border-radius: 8px;
        margin-bottom: 16px;
        border: 1px solid #3e4042;
        overflow: hidden;
    }

    .post-header {
        display: flex;
        align-items: center;
        padding: 12px 16px 8px;
        gap: 8px;
    }

    .post-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
        background: #3a3b3c;
        flex-shrink: 0;
    }

    .post-avatar-placeholder {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        font-weight: 700;
        flex-shrink: 0;
        color: white;
    }

    .post-meta { flex: 1; }

    .post-author {
        font-size: 15px;
        font-weight: 700;
        color: #e4e6eb;
        line-height: 1.2;
    }

    .post-time {
        font-size: 13px;
        color: #b0b3b8;
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .post-actions-header {
        display: flex;
        gap: 4px;
        margin-left: auto;
    }

    .icon-btn {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        border: none;
        background: none;
        color: #b0b3b8;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        transition: background 0.15s;
    }
    .icon-btn:hover { background: #3a3b3c; }

    .post-text {
        padding: 0 16px 12px;
        font-size: 15px;
        line-height: 1.5;
        color: #e4e6eb;
    }

    .post-img {
        width: 100%;
        max-height: 500px;
        object-fit: cover;
        display: block;
        background: #3a3b3c;
    }

    .post-img-placeholder {
        width: 100%;
        height: 300px;
        background: linear-gradient(135deg, #3a3b3c, #4e4f50);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 48px;
        color: #606770;
    }

    .post-stats {
        padding: 8px 16px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #b0b3b8;
        font-size: 15px;
    }

    .post-reactions {
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .reaction-icons {
        display: flex;
    }

    .reaction-icon {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        border: 2px solid #242526;
        font-size: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-left: -4px;
    }
    .reaction-icon:first-child { margin-left: 0; }

    .post-divider {
        height: 1px;
        background: #3e4042;
        margin: 0 16px;
    }

    .post-footer {
        display: flex;
        padding: 4px 8px;
    }

    .post-footer-btn {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 8px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 15px;
        font-weight: 600;
        color: #b0b3b8;
        background: none;
        border: none;
        transition: background 0.15s;
    }
    .post-footer-btn:hover { background: #3a3b3c; }

    /* ===== PAREM SIDEBAR ===== */
    .sidebar-right {
        padding: 16px 8px;
        position: sticky;
        top: 56px;
        height: calc(100vh - 56px);
        overflow-y: auto;
        scrollbar-width: none;
    }
    .sidebar-right::-webkit-scrollbar { display: none; }

    .contacts-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 8px 8px;
    }

    .contacts-title {
        font-size: 17px;
        font-weight: 700;
        color: #e4e6eb;
    }

    .contacts-icons {
        display: flex;
        gap: 4px;
    }

    .contact-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 8px;
        border-radius: 8px;
        cursor: pointer;
        transition: background 0.15s;
    }
    .contact-item:hover { background: #3a3b3c; }

    .contact-avatar-wrap {
        position: relative;
        flex-shrink: 0;
    }

    .contact-avatar {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        object-fit: cover;
        background: #3a3b3c;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        font-weight: 700;
        color: white;
    }

    .contact-online {
        position: absolute;
        bottom: 0;
        right: 0;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #31a24c;
        border: 2px solid #18191a;
    }

    .contact-name {
        font-size: 15px;
        font-weight: 500;
        color: #e4e6eb;
    }

    .sponsored-section {
        margin-top: 16px;
        padding: 8px;
    }

    .sponsored-title {
        font-size: 17px;
        font-weight: 700;
        color: #e4e6eb;
        margin-bottom: 12px;
    }

    .ad-item {
        display: flex;
        gap: 10px;
        padding: 8px;
        border-radius: 8px;
        cursor: pointer;
        transition: background 0.15s;
        margin-bottom: 12px;
    }
    .ad-item:hover { background: #3a3b3c; }

    .ad-img {
        width: 100px;
        height: 100px;
        border-radius: 8px;
        object-fit: cover;
        background: linear-gradient(135deg, #3a3b3c, #4e4f50);
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
    }

    .ad-text { flex: 1; }
    .ad-name { font-size: 14px; font-weight: 500; color: #e4e6eb; }
    .ad-url { font-size: 13px; color: #b0b3b8; margin-top: 2px; }

    /* Mobiil: peidab külgpaneelid */
    @media (max-width: 1100px) {
        .sidebar-right { display: none; }
        .dashboard { grid-template-columns: 280px 1fr; }
    }
    @media (max-width: 768px) {
        .sidebar-left { display: none; }
        .dashboard { grid-template-columns: 1fr; }
    }
</style>

<div class="dashboard">

    <!-- ===== VASAK SIDEBAR ===== -->
    <aside class="sidebar-left">
        <!-- Kasutaja profiil -->
        <a href="#" class="sidebar-item">
            <img src="./images/parempoolne/pfp.png" class="sidebar-avatar" alt="Profiil">
            <span>Gerten Pilv</span>
            <!-- TODO: Asenda päris kasutaja nimega andmebaasist -->
        </a>

        <a href="#" class="sidebar-item">
            <div class="sidebar-icon-circle" style="background:#3a3b3c;">👥</div>
            <span>Sõbrad</span>
        </a>
        <a href="#" class="sidebar-item">
            <div class="sidebar-icon-circle" style="background:#3a3b3c;">🕐</div>
            <span>Mälestused</span>
        </a>
        <a href="#" class="sidebar-item">
            <div class="sidebar-icon-circle" style="background:#3a3b3c;">🔖</div>
            <span>Salvestatud</span>
        </a>
        <a href="#" class="sidebar-item">
            <div class="sidebar-icon-circle" style="background:#3a3b3c;">👥</div>
            <span>Grupid</span>
        </a>
        <a href="#" class="sidebar-item">
            <div class="sidebar-icon-circle" style="background:#3a3b3c;">▶️</div>
            <span>Meediumiklipid</span>
        </a>
        <a href="#" class="sidebar-item">
            <div class="sidebar-icon-circle" style="background:#3a3b3c;">🛍️</div>
            <span>Marketplace</span>
        </a>
        <a href="#" class="sidebar-item show-more">
            <div class="sidebar-icon-circle" style="background:#3a3b3c;">⌄</div>
            <span>Kuva rohkem</span>
        </a>

        <div class="sidebar-divider"></div>

        <div class="sidebar-section-title">Sinu otseteed</div>

        <!-- TODO: Asenda päris gruppide/lehtedega andmebaasist -->
        <a href="#" class="sidebar-item">
            <div class="shortcut-icon" style="background:#5a3e8c; border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:18px;">🏔️</div>
            <span class="sidebar-item-sm">Kohtla-Nõmme sõbrad</span>
        </a>
        <a href="#" class="sidebar-item">
            <div class="shortcut-icon" style="background:#1a5c8c; border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:18px;">🎯</div>
            <span class="sidebar-item-sm">Missiooniga noorte juhtide arenguprogramm</span>
        </a>
        <a href="#" class="sidebar-item">
            <div class="shortcut-icon" style="background:#c0392b; border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:18px;">📅</div>
            <span class="sidebar-item-sm">Huvikaitse arenguprogramm</span>
        </a>
        <a href="#" class="sidebar-item">
            <div class="shortcut-icon" style="background:#27ae60; border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:18px;">🎓</div>
            <span class="sidebar-item-sm">Eesti Haridusfoorum</span>
        </a>
        <a href="#" class="sidebar-item">
            <div class="shortcut-icon" style="background:#e67e22; border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:18px;">🏘️</div>
            <span class="sidebar-item-sm">Toila valla kohalik elu</span>
        </a>
        <a href="#" class="sidebar-item show-more">
            <div class="sidebar-icon-circle" style="background:#3a3b3c;">⌄</div>
            <span>Kuva rohkem</span>
        </a>
    </aside>

    <!-- ===== FEED ===== -->
    <main class="feed">

        <!-- Lood / Stories -->
        <div class="stories">
            <!-- Loo lugu nupp -->
            <div class="story-card story-create">
                <div class="story-create-top">
                    <img src="./images/parempoolne/pfp.png" style="width:100%; height:130px; object-fit:cover; display:block;">
                </div>
                <div style="height:30px; background:#3a3b3c; display:flex; align-items:center; justify-content:center; position:relative; margin-top:-20px;">
                    <div class="story-create-plus">+</div>
                </div>
                <div class="story-create-label" style="margin-top:8px;">Loo lugu</div>
            </div>

            <!-- TODO: Asenda päris lugudega andmebaasist -->
            <div class="story-card" style="background: linear-gradient(160deg, #1a3a6c, #0866ff);">
                <div class="story-name">Kaarel Taimla</div>
            </div>
            <div class="story-card" style="background: linear-gradient(160deg, #8c1a1a, #e03131);">
                <div class="story-name">Sara Täna Noo... 200</div>
            </div>
            <div class="story-card" style="background: linear-gradient(160deg, #1a6c3a, #2f9e44);">
                <div class="story-name">Kohtla-Nõmme Kool</div>
            </div>
            <div class="story-card" style="background: linear-gradient(160deg, #5c3a9c, #845ef7);">
                <div class="story-name">Emma Rebane</div>
            </div>
            <div class="story-card" style="background: linear-gradient(160deg, #3a5c1a, #74c32b);">
                <div class="story-name">Joonas Ka...</div>
            </div>
        </div>

        <!-- Loo postitus kast -->
        <div class="create-post">
            <div class="create-post-top">
                <img src="./images/parempoolne/pfp.png" alt="Profiil">
                <!-- TODO: Asenda kasutaja profiilipildiga andmebaasist -->
                <button class="create-post-input">Millest mõtled, Gerten?</button>
                <!-- TODO: Asenda kasutaja nimega andmebaasist -->
            </div>
            <div class="create-post-divider"></div>
            <div class="create-post-actions">
                <button class="create-post-btn">
                    <span class="icon">🎥</span> Otseülekanne
                </button>
                <button class="create-post-btn">
                    <span class="icon">🖼️</span> Foto/video
                </button>
                <button class="create-post-btn">
                    <span class="icon">😊</span> Tunne/tegevus
                </button>
            </div>
        </div>

        <!-- ===== POSTITUSED ===== -->
        <!-- TODO: Asenda päris postitustega andmebaasist – foreach loop siin -->

        <!-- Postitus 1 -->
        <div class="post">
            <div class="post-header">
                <div class="post-avatar-placeholder" style="background:#5a3e8c;">E</div>
                <div class="post-meta">
                    <div class="post-author">Eestlaste Arvamus</div>
                    <!-- TODO: Andmebaasist: $post->author_name -->
                    <div class="post-time">
                        <span>Eha Priidik · 2 min tagasi</span>
                        <!-- TODO: Andmebaasist: $post->created_at -->
                        🌍
                    </div>
                </div>
                <div class="post-actions-header">
                    <button class="icon-btn">···</button>
                    <button class="icon-btn">✕</button>
                </div>
            </div>
            <div class="post-text">
                <!-- TODO: Andmebaasist: $post->content -->
                <strong>Sandra Laur</strong> asub kohas nimega <strong>Haridus- ja Teadusministeerium</strong>.<br>
                <span style="color:#b0b3b8; font-size:13px;">3. märts at 11:13 · Tallinn, Harju maakond · 🌍</span><br><br>
                Minister Kallase revolutsiooniline plaan: palavikust lahtisaamiseks tuleb ära visata kraadiklaas.
            </div>
            <div class="post-img-placeholder">🏛️</div>
            <!-- TODO: <img class="post-img" src="<?= $post->image_url ?>"> -->
            <div class="post-stats">
                <div class="post-reactions">
                    <div class="reaction-icons">
                        <div class="reaction-icon" style="background:#0866ff;">👍</div>
                        <div class="reaction-icon" style="background:#e03131;">❤️</div>
                        <div class="reaction-icon" style="background:#f59f00;">😄</div>
                    </div>
                    <span style="margin-left:8px;">1,2 tuh</span>
                    <!-- TODO: Andmebaasist: $post->reaction_count -->
                </div>
                <span>48 kommentaari · 12 jagamist</span>
                <!-- TODO: Andmebaasist: $post->comment_count, $post->share_count -->
            </div>
            <div class="post-divider"></div>
            <div class="post-footer">
                <button class="post-footer-btn">👍 Meeldib</button>
                <button class="post-footer-btn">💬 Kommenteeri</button>
                <button class="post-footer-btn">↗️ Jaga</button>
            </div>
        </div>

        <!-- Postitus 2 -->
        <div class="post">
            <div class="post-header">
                <div class="post-avatar-placeholder" style="background:#1a6c3a;">K</div>
                <div class="post-meta">
                    <div class="post-author">Kohtla-Nõmme Kool</div>
                    <div class="post-time"><span>Eile kell 14:32</span> 👥</div>
                </div>
                <div class="post-actions-header">
                    <button class="icon-btn">···</button>
                    <button class="icon-btn">✕</button>
                </div>
            </div>
            <div class="post-text">
                🎉 Suur tänu kõigile, kes osalesid meie kevadkontserdil! Oli imeline õhtu täis muusikat ja rõõmu. Järgmine üritus toimub 15. aprillil – olge oodatud! 🌸
            </div>
            <div class="post-img-placeholder" style="height:200px; font-size:64px;">🎵</div>
            <div class="post-stats">
                <div class="post-reactions">
                    <div class="reaction-icons">
                        <div class="reaction-icon" style="background:#e03131;">❤️</div>
                        <div class="reaction-icon" style="background:#0866ff;">👍</div>
                    </div>
                    <span style="margin-left:8px;">234</span>
                </div>
                <span>16 kommentaari</span>
            </div>
            <div class="post-divider"></div>
            <div class="post-footer">
                <button class="post-footer-btn">👍 Meeldib</button>
                <button class="post-footer-btn">💬 Kommenteeri</button>
                <button class="post-footer-btn">↗️ Jaga</button>
            </div>
        </div>

        <!-- Postitus 3 -->
        <div class="post">
            <div class="post-header">
                <img src="./images/parempoolne/pfp.png" class="post-avatar" alt="">
                <div class="post-meta">
                    <div class="post-author">Gerten Pilv</div>
                    <div class="post-time"><span>3 päeva tagasi</span> 🌍</div>
                </div>
                <div class="post-actions-header">
                    <button class="icon-btn">···</button>
                </div>
            </div>
            <div class="post-text">
                Ilus päev Tallinnas! ☀️ #tallinn #kevad
            </div>
            <div class="post-img-placeholder" style="height:350px; font-size:80px; background: linear-gradient(135deg, #1a3a5c, #0866ff);">🌆</div>
            <div class="post-stats">
                <div class="post-reactions">
                    <div class="reaction-icons">
                        <div class="reaction-icon" style="background:#0866ff;">👍</div>
                        <div class="reaction-icon" style="background:#f59f00;">😮</div>
                    </div>
                    <span style="margin-left:8px;">57</span>
                </div>
                <span>5 kommentaari</span>
            </div>
            <div class="post-divider"></div>
            <div class="post-footer">
                <button class="post-footer-btn">👍 Meeldib</button>
                <button class="post-footer-btn">💬 Kommenteeri</button>
                <button class="post-footer-btn">↗️ Jaga</button>
            </div>
        </div>

        <!-- Postitus 4 – tekst pikk -->
        <div class="post">
            <div class="post-header">
                <div class="post-avatar-placeholder" style="background:#c0392b;">M</div>
                <div class="post-meta">
                    <div class="post-author">Meta AI</div>
                    <div class="post-time"><span>1 nädal tagasi</span> 🌍</div>
                </div>
                <div class="post-actions-header">
                    <button class="icon-btn">···</button>
                    <button class="icon-btn">✕</button>
                </div>
            </div>
            <div class="post-text">
                Uus Meta AI uuendus on nüüd kõigile Eestis kättesaadav! Proovi meid otse Facebooki otsinguribalt. 🤖✨
            </div>
            <div class="post-stats">
                <div class="post-reactions">
                    <div class="reaction-icons">
                        <div class="reaction-icon" style="background:#0866ff;">👍</div>
                    </div>
                    <span style="margin-left:8px;">3,4 tuh</span>
                </div>
                <span>211 kommentaari · 88 jagamist</span>
            </div>
            <div class="post-divider"></div>
            <div class="post-footer">
                <button class="post-footer-btn">👍 Meeldib</button>
                <button class="post-footer-btn">💬 Kommenteeri</button>
                <button class="post-footer-btn">↗️ Jaga</button>
            </div>
        </div>

    </main>

    <!-- ===== PAREM SIDEBAR ===== -->
    <aside class="sidebar-right">

        <!-- Kontaktid -->
        <div class="contacts-header">
            <span class="contacts-title">Kontaktid</span>
            <div class="contacts-icons">
                <button class="icon-btn">🔍</button>
                <button class="icon-btn">✏️</button>
                <button class="icon-btn">⋯</button>
            </div>
        </div>

        <!-- TODO: Asenda päris sõpradega andmebaasist – foreach loop -->
        <div class="contact-item">
            <div class="contact-avatar-wrap">
                <div class="contact-avatar" style="background:#0866ff;">M</div>
                <div class="contact-online"></div>
            </div>
            <span class="contact-name">Meta AI</span>
        </div>
        <div class="contact-item">
            <div class="contact-avatar-wrap">
                <div class="contact-avatar" style="background:#e03131;">E</div>
                <div class="contact-online"></div>
            </div>
            <span class="contact-name">Emma Rebane</span>
        </div>
        <div class="contact-item">
            <div class="contact-avatar-wrap">
                <div class="contact-avatar" style="background:#2f9e44;">A</div>
                <div class="contact-online"></div>
            </div>
            <span class="contact-name">Anna-Liisa Mägi</span>
        </div>
        <div class="contact-item">
            <div class="contact-avatar-wrap">
                <div class="contact-avatar" style="background:#f59f00;">K</div>
            </div>
            <span class="contact-name">Kaupo So</span>
        </div>
        <div class="contact-item">
            <div class="contact-avatar-wrap">
                <div class="contact-avatar" style="background:#845ef7;">C</div>
                <div class="contact-online"></div>
            </div>
            <span class="contact-name">Carlos Prii</span>
        </div>
        <div class="contact-item">
            <div class="contact-avatar-wrap">
                <div class="contact-avatar" style="background:#e67e22;">A</div>
            </div>
            <span class="contact-name">Angela Ikonen</span>
        </div>
        <div class="contact-item">
            <div class="contact-avatar-wrap">
                <div class="contact-avatar" style="background:#20c997;">M</div>
                <div class="contact-online"></div>
            </div>
            <span class="contact-name">Maris Toomel</span>
        </div>
        <div class="contact-item">
            <div class="contact-avatar-wrap">
                <div class="contact-avatar" style="background:#74c32b;">A</div>
            </div>
            <span class="contact-name">Aleks Nazarenko</span>
        </div>
        <div class="contact-item">
            <div class="contact-avatar-wrap">
                <div class="contact-avatar" style="background:#e03131;">S</div>
                <div class="contact-online"></div>
            </div>
            <span class="contact-name">Sebastian Rock</span>
        </div>
        <div class="contact-item">
            <div class="contact-avatar-wrap">
                <div class="contact-avatar" style="background:#1c7ed6;">I</div>
            </div>
            <span class="contact-name">Indrek Olen</span>
        </div>
        <div class="contact-item">
            <div class="contact-avatar-wrap">
                <div class="contact-avatar" style="background:#5c7cfa;">J</div>
                <div class="contact-online"></div>
            </div>
            <span class="contact-name">Joel Aaron Reiska</span>
        </div>
        <div class="contact-item">
            <div class="contact-avatar-wrap">
                <div class="contact-avatar" style="background:#f783ac;">A</div>
            </div>
            <span class="contact-name">Aurelia Pärtelson</span>
        </div>

        <!-- Reklaamid -->
        <div class="sponsored-section">
            <div class="sponsored-title">Sponsoreeritud</div>
            <!-- TODO: Asenda päris reklaamidega -->
            <div class="ad-item">
                <div class="ad-img">🛒</div>
                <div class="ad-text">
                    <div class="ad-name">Kaup.ee – Parimad pakkumised</div>
                    <div class="ad-url">kaup.ee</div>
                </div>
            </div>
            <div class="ad-item">
                <div class="ad-img">🏠</div>
                <div class="ad-text">
                    <div class="ad-name">KV.ee – Leia oma kodu</div>
                    <div class="ad-url">kv.ee</div>
                </div>
            </div>
        </div>

    </aside>
</div>
