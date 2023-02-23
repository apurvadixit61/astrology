<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>
<style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans);
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'poppins', sans-serif;
}
.topbar {
    position: fixed;
    background-color: #fff;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.08);
    width: 100%;
    padding: 0 20px;
    height: 60px;
    display: grid;
    grid-template-columns: 2fr 10fr 0.4fr 1fr;
    align-items: center;
    z-index: 1;
}
img {
    border-radius: 50%;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.logo h2 {
    font-weight: 500;
    color: #FE8302;
    font-size: 26px;
}

.search {
    position: relative;
    width: 32%;
    margin-left: 70px;
}
.search input {
    width: 100%;
    min-width: 128px;
    height: 40px;
    padding: 0 20px;
    font-size: 16px;
    outline: none;
    border: none;
    border-radius: 10px;
    background: #f5f5f5;
    border: 1px solid #CCCCCC;
}
.search i {
    color: #FE8302;
    position: absolute;
    right: 15px;
    top: 12px;
    cursor: pointer;
}
.fa-bell {
    justify-self: right;
    color: #FE8302;
}
.user {
    position: relative;
    width: 50px;
    height: 50px;
    justify-self: right;
}
/* sidebar  */
.sidebar {
    position: fixed;
    top: 60px;
    width: 260px;
    height: calc(100% - 60px);
    background: #FE8302;
    overflow-x: hidden;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    z-index: 2;
}
.sidebar ul {
    margin-top: 20px;
}
.sidebar ul li {
    width: 80%;
    list-style: none;
    background-color: white; 
     color: #FE8302;
    border: 1px solid white;
    margin: 20px;
    border-radius: 10px;
}

.sidebar ul li:hover {
    background: #fff;
}
.sidebar ul li:hover a {
    color: #FE8302;
}
.sidebar ul li a {
    width: 100%;
    text-decoration: none;
    color: #FE8302;
    height: 60px;
    display: flex;
    align-items: center;
}
.sidebar ul li a i {
    min-width: 60px;
    font-size: 24px;
    text-align: center;
}
 /* main  */
.main {
    position: absolute;
    top: 60px;
    width: calc(100% - 260px);
    min-height: calc(100vh - 60px);
    left: 260px;
    background: #f5f5f5;
}
.cards {
    width: 100%;
    padding: 35px 20px;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-gap: 20px;
}
.cards .card {
    padding: 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
}
.number {
    font-size: 35px;
    font-weight: 500;
    color: #FE8302;
}
.card-name {
    color: #1B1B29;
    font-weight: 500;
}
.icon-box i {
    font-size: 45px;
    color: #FE8302;
}
/* charts  */
.charts {
    display: grid;
    grid-template-columns: 2fr 1fr;
    grid-gap: 20px;
    width: 100%;
    padding: 20px;
    padding-top: 0;
}
.chart {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
    width: 100%;
}
.chart h2 {
    margin-bottom: 5px;
    font-size: 20px;
    color: #666;
    text-align: center
}
@media (max-width:1115px) {
    .sidebar {
        width: 60px;
    }
    .main {
        width: calc(100% - 60px);
        left: 60px;
    }
}
@media (max-width:880px) {
    /* .topbar {
        grid-template-columns: 1.6fr 6fr 0.4fr 1fr;
    } */
    .fa-bell {
        justify-self: left;
    }
    .cards {
        width: 100%;
        padding: 35px 20px;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 20px;
    }
    .charts {
        grid-template-columns: 1fr;
    }
    .doughnut-chart {
        padding: 50px;
    }
    #doughnut {
        padding: 50px;
    }
}
@media (max-width:500px) {
    .topbar {
        grid-template-columns: 1fr 5fr 0.4fr 1fr;
    }
    .logo h2 {
        font-size: 20px;
    }
    .search {
        width: 80%;
    }
    .search input {
        padding: 0 20px;
    }
    .fa-bell {
        margin-right: 5px;
    }
    .cards {
        grid-template-columns: 1fr;
    }
    .doughnut-chart {
        padding: 10px;
    }
    #doughnut {
        padding: 0px;
    }
    .user {
        width: 40px;
        height: 40px;
    }
}

</style>

<body>
    <div class="container">
        <div class="topbar">
            <div class="logo">
                <img src="./img/logo.png" alt="" class="user">
                <h2 style="margin-top: -42px;margin-left: 61px;">Astologer</h2>
            </div>
            <div class="search">
                <input type="text" name="search" placeholder="search here">
                <label for="search"><i class="fas fa-search"></i></label>
            </div>
            <i class="fas fa-bell"></i>
            <div class="user">
                <img src="./img/istockphoto-1369338497-170667a.jpg" alt="">
            </div>
        </div>
        <div class="sidebar">
            <ul>
                <li>
                    <a href="#">
                        <i class="fas fa-th-large"></i>
                        <div style="font-size: 22px;">Dashboard</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="far fa-usd-circle"></i>
                        <div style="font-size: 22px;">History</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/user/wallets')}}">
                        <i class="far fa-usd-circle"></i>
                        <div style="font-size: 22px;">Wallets</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('user/logout')}}">
                        <i class="far fa-sign-out"></i>
                        <div style="font-size: 22px;">Logout</div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main">
            <div class="cards">
                <div class="card">
                    <div class="card-content">
                        <div class="number">1217</div>
                        <div class="card-name">Total Call and Chat</div>
                    </div>
                    <div class="icon-box">
                        <i class="far fa-list-alt"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="number">42</div>
                        <div class="card-name">Total Call</div>
                    </div>
                    <div class="icon-box">
                        <i class="far fa-phone-alt"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="number">68</div>
                        <div class="card-name">Total Chat</div>
                    </div>
                    <div class="icon-box">
                        <i class="far fa-comment-lines"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="number">$4500</div>
                        <div class="card-name">Total Income</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>