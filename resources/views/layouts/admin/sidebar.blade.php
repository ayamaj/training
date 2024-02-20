<div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text">
               BLOG
            </a>
        </div>
        <ul class="nav">
            <li>
            {{-- <li class="nav-item active"> --}}
                <a class="nav-link" href="{{ url('/etudiant')}}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>ETUDIANT</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ url('/post')}}">
                    <i class="nc-icon nc-circle-09"></i>
                    <p> POSTS </p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="./table.html">
                    <i class="nc-icon nc-notes"></i>
                    <p>USERS</p>
                </a>
            </li>


            <li class="nav-item active active-pro">
                <a class="nav-link active" href="upgrade.html">
                    <i class="nc-icon nc-alien-33"></i>

                </a>
            </li>
        </ul>
    </div>
</div>
