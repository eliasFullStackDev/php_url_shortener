<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP URL Shortener</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body{
            background: #f8f9fa;
        }
        .short-url-box {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        input.form-control[readonly]{
            background-color: #e9ecef;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card shadow p-4">
            <h2 class="mb-3 text-center text-primary">
                PHP URL Shortener
            </h2>
            <form action="shorten.php" method="post">
                <div class="mb-3">
                    <input type="url" 
                           class="form-control form-control-lg"
                           name="long_url"
                           required
                           placeholder="Enter your URL">
                </div>
                <div class="d-grid">
                    <button class="btn btn-success btn-lg">Generate Short URL</button>
                </div>
            </form>

            <?php if(isset($_GET['code'])):
              $shortUrl = "http://" .$_SERVER['SERVER_NAME']. "/x/".$_GET['code'];
     
            ?>
            <div class="alert alert-info mt-4">
                <label class="form-label fw-bold">Short Url:</label>
                <div class="short-url-box">
                    <input type="text" 
                           class="form-control"
                           value="<?=$shortUrl?>"
                           id="shortUrl"
                           readonly >
                    <button class="btn btn-outline-primary"
                            onclick="copyShortUrl()">Copy</button>
                </div>
            </div>
            <div>
                Test: <a href="<?=$shortUrl?> " target="_blank" class="btn link-info"><?=$shortUrl?></a>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <script>
        function copyShortUrl(){
            const shortUrlInput = document.getElementById("shortUrl");
            shortUrlInput.select();
            shortUrlInput.setSelectionRange(0, 999999); // for mobile devices
            document.execCommand("copy");
            alert("short URL copied to clipboard!");
        }
    </script>
</body>
</html>