<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <title>🛠️ 後台管理</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fffafc;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        h3, h3 a {
            text-align: center;
            color: #e57373;
            margin: 10px 0;
            text-decoration: none;
            display: block;
        }

        .sidebar {
            width: 220px;
            background-color: #fce4ec;

            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar .menu a {
            display: block;
            padding: 12px 16px;
            /* margin-top: 10px; */
            margin: 30px 0;
            background-color: #f8bbd0;
            color: #e57373;
            text-align: center;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.2s;
        }

        .sidebar .menu a:hover {
            background-color: #f48fb1;
            color: #fce4ec;
        }

        .sidebar .logout {
            display: block;
            margin-top: auto;
            background-color: #e57373;
            color: white;
            border: none;
            text-align: center;
            padding: 12px;
            border-radius: 8px;
            text-decoration: none;
        }

        .sidebar .logout:hover {
            background-color: #d32f2f;
        }

        /* 主區 */
        .main-content {
            flex: 1;
            padding: 30px;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
            background-color: #fff0f5;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            margin-top: 20px;
            font-size: 15px;
        }

        table th,
        table td {
            padding: 12px 16px;
            text-align: left;
        }

        table th {
            background-color: #f8bbd0;
            color: #880e4f;
            font-weight: bold;
            border-bottom: 2px solid #f48fb1;
        }

        table td {
            background-color: #fff;
            color: #333;
            vertical-align: middle;
            border-bottom: 1px solid #fce4ec;
        }

        table tr:hover td {
            background-color: #ffe3ec;
        }

        input[type="text"] {
            border: 1px solid #f8bbd0;
            padding: 6px 10px;
            border-radius: 6px;
            width: 100%;
        }

        input[type="submit"],
        input[type="reset"],
        input[type="button"] {
            padding: 8px 16px;
            border-radius: 8px;
            background-color: #f48fb1;
            border: none;
            color: white;
            font-weight: bold;
            margin: 5px;
            transition: background-color 0.2s;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover,
        input[type="button"]:hover {
            background-color: #e57373;
        }

        /* 美化分頁元件 */
        .pagination {
            justify-content: center;
            margin-top: 30px;
            flex-wrap: wrap;
            gap: 6px;
        }

        .pagination .page-item {
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .pagination .page-link {
            border: none;
            background-color: #fceff1;
            /* 淺粉色 */
            color: #d75d75;
            /* 主色文字 */
            font-weight: bold;
            padding: 8px 16px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, color 0.3s;
        }

        .pagination .page-link:hover {
            background-color: #f9d9de;
            color: #a02f4d;
            text-decoration: none;
        }

        .pagination .page-item.active .page-link {
            background-color: #e16b8c;
            /* 主色 */
            color: white;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <h3><a href="./dashboard.php">後台管理</a></h3>
            <div class="menu">
                <a href="?do=main" class="menu-ajax" data-page="main">後台首頁</a>
                <a href="?do=product" class="menu-ajax" data-page="product">作品集照片</a>
                <a href="?do=place" class="menu-ajax" data-page="place">環境/設備照片</a>
                <a href="?do=date" class="menu-ajax" data-page="date">預約時間圖</a>
                <a href="?do=admin" class="menu-ajax" data-page="admin">使用者管理</a>
            </div>
            <a href="./api/logout.php" class="logout">登出</a>
        </div>

        <main id="main-content" class="main-content">
            <?php
            $do = $_GET['do'] ?? 'main';
            $file = "./backend/" . $do . ".php";
            if (file_exists($file)) {
                include $file;
            } else {
                include './backend/main.php';
            }
            ?>
        </main>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AJAX Menu -->
    <script>
        $(document).ready(function() {
            $(".menu-ajax").on("click", function(e) {
                e.preventDefault();

                const page = $(this).data("page");
                const url = `dashboard.php?do=${page}`;

                history.pushState(null, null, url); // ✅ 更新網址

                $("#main-content").fadeOut(100, function() {
                    $("#main-content").load(`./backend/${page}.php`, function() {
                        $("#main-content").fadeIn(200);
                    });
                });
            });

            // ✅ 處理瀏覽器返回/前進按鈕的情況
            window.onpopstate = function() {
                const urlParams = new URLSearchParams(window.location.search);
                const page = urlParams.get('do') || 'main';

                $("#main-content").fadeOut(100, function() {
                    $("#main-content").load(`./backend/${page}.php`, function() {
                        $("#main-content").fadeIn(200);
                    });
                });
            };
        });
    </script>
</body>

</html>