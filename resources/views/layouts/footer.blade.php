<style>
    .footer {
        background: #152F4F;
        color: white;

        .links {
            ul {
                list-style-type: none;
            }

            li a {
                color: white;
                transition: color .2s;

                &:hover {
                    text-decoration: none;
                    color: #4180CB;
                }
            }
        }

        .about-company {
            i {
                font-size: 25px;
            }

            a {
                color: white;
                transition: color .2s;

                &:hover {
                    color: #4180CB
                }
            }
        }

        .location {
            i {
                font-size: 18px;
            }
        }

        .copyright p {
            border-top: 1px solid rgba(255, 255, 255, .1);
        }
    }

</style>
<div class="mt-5 pt-5 footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-xs-12 about-company">
                <h2>Örnek E-Ticaret Sitesi</h2>
                <p class="pr-5 text-white-150">191307028 Yakup Yaşa tarafından yapılmıştır.</p>
            </div>
            <div class="col-lg-3 col-xs-12 links">
                <h4 class="mt-lg-0 mt-sm-3">Linkler</h4>
                <ul class="m-0 p-0" style="list-style-type:none">
                    <li><a href="{{url('/misyonvizyon')}}" style="color: white">Misyon-Vizyon</a></li>
                    <li><a href="{{url('/hakkimizda')}}" style="color: white">Hakkımızda</a></li>
                    <li><a href="{{url('/iletisim')}}" style="color: white">İletişim</a></li>
                    <li><a href="http://www.facebook.com" style="color: white">Facebook</a></li>
                    <li><a href="http://www.instagram.com" style="color: white">Instagram</a></li>
                    <li><a href="http://www.twitter.com" style="color: white">Twitter</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-xs-12 location">
                <h4 class="mt-lg-0 mt-sm-4">Konum</h4>
                <p>22, Lorem ipsum dolor, consectetur adipiscing</p>
                <p class="mb-0">(541) 754-3010</p>
                <p>ornek@ornek.com</p>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col copyright">
                <p class=""><small class="text-white-50">© 2022. All Rights Reserved.</small></p>
            </div>
        </div>
    </div>
</div>
