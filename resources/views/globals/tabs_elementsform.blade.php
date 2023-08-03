<ul class="nav nav-tabs nav-bold nav-tabs-line">

    <li class="nav-item">
        <div class="dropdown">
            <button class="nav-link dropdown-toggle "
                    type="button"
                    id="dropdownMenuButton"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                    style="background: #ffffff00"
            >
                Réglages
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="">Apparence</a>
                <a class="dropdown-item" href="">Confirmation</a>
                <a class="dropdown-item" href="{">Notification</a>
                <a class="dropdown-item" href="">Configuration SMTP</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link "  href="{{route('webformulaire.building',$id)}}">Éditer </a>
    </li>
    <li class="nav-item">
        <a class="nav-link "  href="{{route('webformulaire.see',$id)}}" id="preview_form"  >Aperçu </a>
    </li>

    <li class="nav-item">
            <a class="nav-link "
                                        href="{{route('webformulaire.rules',$form['id'])}}" id="Logique_form"  >Logique conditionnelle </a>
    </li>
</ul>


{{--@section('alert')--}}
{{--    <script >--}}
{{--        function redirectTo(el){--}}
{{--            location.href = $(this).--}}
{{--        }--}}
{{--    </script >--}}
{{--@endsection--}}
{{--    <script>--}}
{{--        --}}
{{--            if($("#preview_form").attr("href")) {--}}
{{--                    $("#preview_form").click(function(e) {--}}
{{--                        setTimeout(()=>{--}}
{{--                            Swal.fire("Aperçu du formulaire", "veuillez d'abord enregistrer votre formulaire", "success");--}}
{{--                        },1000)--}}
{{--                    });--}}

{{--            }else{--}}
{{--                $("#preview_form").click(function(e) {--}}
{{--                    setTimeout(()=>{ Swal.fire("Aperçu du formulaire", "veuillez d'abord enregistrer votre formulaire", "warning");    },1000)--}}
{{--                });--}}
{{--            }--}}
{{--    </script>--}}
{{--@endsection--}}
