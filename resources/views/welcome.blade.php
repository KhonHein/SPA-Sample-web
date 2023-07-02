


<!DOCTYPE html>
<html>
<style>
body, html {
  height: 100%;
  margin: 0;
}

.bgimg {
  background-image: url('https://www.westend61.de/images/0001077564pw/side-view-of-woman-looking-at-view-while-sitting-on-mountain-against-clear-sky-CAVF55466.jpg');
  height: 100%;
  opacity:0.9;
  background-position: center;
  background-size: cover;
  position: relative;
  color: white;
  font-family: "Courier New", Courier, monospace;
  font-size: 25px;
}

.right {
  position: absolute;
  top: 1rem;
  right: 16px;
}

.bottomleft {
  position: absolute;
  bottom: 0;
  left: 16px;
}

.middle {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}
.middle a:hover,
.right a:hover{
    background:transparent;
    color:white;
    font-weight:bold;
}
.middle a,
.right a{
    text-decoration:none;
    border:1px solid white;
    border-radius: 5px;
    margin-bottom:1rem;
    padding:.1rem .2rem;
    background:black;
    color:yellow;
}
.middle a{
  padding:2rem .5rem;
}

hr {
  margin: auto;
  width: 40%;
}
</style>
<body>

<div class="bgimg">
  <div class="right">
    <a href="{{ url('/home') }}" class="btn btn-sm border border-outline-success rounded-2">Let's Go</a>
  </div>
  <div class="middle">
            <!-- @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif -->
    
    <a href="{{ url('/home') }}" class="btn btn-sm border border-outline-success rounded-2">Welcome to Example SAP web ! </a>
  </div>
  <!-- <div class="bottomleft">
    <p>Some text</p>
  </div> -->
</div>

</body>
</html>
