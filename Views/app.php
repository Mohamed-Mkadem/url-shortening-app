<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClipZip - URL Shortener</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="<?=asset("Assets/CSS/main.css", 0)?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>

<body>
    <div class="container">
        <?php include asset("Partials/header.php", 0)?>
        <div class="showcase">
            <div class="row">
                <div class="col">
                    <form class="shortener-form" method="POST" id="form">
                        <div class="form-control">
                            <label for="url">Shorten Your Long URL</label>
                            <input type="url" name="url" id="url"   placeholder="Your Long URL">
                            <p class="error-message">Invalid URL</p>
                        </div>
                        <div class="form-control" id="shorten">
                            <label>Customize Your Link</label>
                            <div class="customize-holder">
                                <select name="domain" id="domain">
                                    <option value="clipzip.com">ClipZip.com</option>
                                    <option value="clipzip.net">ClipZip.net</option>
                                </select>
                                <input type="text" name="alias" id="alias" placeholder="Enter Alias">
                            </div>
                            <button type="submit" class="shortenBtn" id="shortenBtn">Shorten URL</button>
                            <p class="error-message"></p>
                        </div>
                        <div class="form-control " id="shorten-result">
                            <label>The Shortened URL</label>
                            <input type="text" id="shortenedValue" readonly value="https://clipzip.com/shortenedUrl">
                            <div class="actions-holder">
                                <a href="https://clipzip.com/shortenedUrl" target="_blank" id="visitLink">Visit Link</a>
                                <button class="copy" type="button" id="copyBtn">Copy</button>
                            </div>
                            <button class="shortenBtn"  type="button" id="shortenNewBtn">Shorten Another URL</button>
                        </div>
                    </form>
                </div>
                <div class="col">
                    <h1>
                        The Original URL Shortener
                    </h1>
                    <p>Create shorter URLs with ClipZip. </p>
                    <div class="cta-box">
                        <p>Want more out of your link shortener? Track link analytics, use branded domains for fully
                            custom links, and manage your links with our paid plans.</p>
                        <div class="links-box ">
                            <a href="" class="outlined">View Plans</a>
                            <a href="">Register</a>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>


    <script type="module" src="<?=asset("Assets/JS/main.js", 0)?>" ></script>
</body>

</html>