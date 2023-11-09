@include('layouts.layoutUser')

@if ($errors->any())
<div class="flex items-center px-3 py-2 mb-2 bg-red-500 border-l-4 border-red-700 shadow-md">
    <!-- icons -->
    <div class="mr-3 text-red-500 bg-white rounded-full">
        <svg width="1.8em" height="1.8em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z" />
            <path fill-rule="evenodd"
                d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z" />
        </svg>
    </div>
    <!-- message -->
    <div class="max-w-xs text-white ">
        @foreach ($errors->all() as $error)
        {{ $error }}
        @endforeach
    </div>
</div>
@endif

<h1 class="pt-4 pb-4 pl-4 text-2xl font-bold">FORM TUJUAN</h1>

<form action="{{ route('oddoOutPost') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="flex p-4 pt-8 pb-8 pl-6">
        <div class="flex items-center p-4 bg-blue-400 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 fill-white">
                <path
                    d="M3.375 4.5C2.339 4.5 1.5 5.34 1.5 6.375V13.5h12V6.375c0-1.036-.84-1.875-1.875-1.875h-8.25zM13.5 15h-12v2.625c0 1.035.84 1.875 1.875 1.875h.375a3 3 0 116 0h3a.75.75 0 00.75-.75V15z" />
                <path
                    d="M8.25 19.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0zM15.75 6.75a.75.75 0 00-.75.75v11.25c0 .087.015.17.042.248a3 3 0 015.958.464c.853-.175 1.522-.935 1.464-1.883a18.659 18.659 0 00-3.732-10.104 1.837 1.837 0 00-1.47-.725H15.75z" />
                <path d="M19.5 19.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
            </svg>
        </div>
        <div class="w-full pl-2 ml-4">
            <span class="font-bold">Mobil : </span>
            <select class="w-full js-example-basic-single" name="vehicles_id" id="vehicelsSelect">
                @foreach ($kendaraan as $k)
                <option value="{{ $k->id }}" data-last-oddo="{{ $k->last_oddo }}">{{ $k->nomor_plat }}</option>
                @endforeach
            </select>
        </div>
    </div>


    <div class="flex p-4 pt-8 pb-8 pl-6 ">
        <div class="flex items-center p-4 bg-blue-400 rounded-lg">
            <svg height="800px" width="800px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"
                class="w-6 h-6">
                <g id="SVGRepo_bgCarrier" stroke-width="0" />
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                <g id="SVGRepo_iconCarrier">
                    <style type="text/css">
                        .st0 {
                            fill: #ffffff;
                        }
                    </style>
                    <g>
                        <path class="st0"
                            d="M255.996,74.939C114.838,74.939,0,189.784,0,330.942c0,19.646,2.24,39.233,6.667,58.228 c0.509,2.18,1.093,4.202,1.745,6.074c7.714,24.672,30.948,41.817,56.865,41.817h381.364c24.104,0,45.847-14.785,55-36.679 c1.108-2.18,2.03-4.599,2.734-7.296c0.27-1.026,0.689-2.741,1.318-5.528c4.179-18.478,6.307-37.54,6.307-56.617 C512,189.784,397.155,74.939,255.996,74.939z M475.763,380.811c-1.026,4.547-1.356,5.64-1.431,5.64l0.067-0.921 c-3.579,12.35-14.897,20.852-27.758,20.852H65.277c-12.831,0-24.119-8.456-27.729-20.77l0.21,1.416 c-0.045,0-0.33-1.026-1.214-4.816c-3.835-16.471-5.865-33.631-5.865-51.27c0-124.448,100.877-225.324,225.317-225.324 c124.44,0,225.324,100.876,225.324,225.324C481.321,348.08,479.396,364.767,475.763,380.811z" />
                        <path class="st0"
                            d="M267.569,297.207c-3.633-1.244-7.52-1.955-11.572-1.955c-19.707,0-35.683,15.976-35.683,35.69 c0,19.706,15.976,35.682,35.683,35.682c18.036,0,32.912-13.392,35.308-30.769c0.225-1.618,0.374-3.243,0.374-4.913 C291.679,315.288,281.59,302.015,267.569,297.207z" />
                        <path class="st0"
                            d="M399.716,194.787c-3.138-3.392-8.808-3.468-13.257-0.18l-123.594,91.004c2.696,0.412,5.378,1.049,8.014,1.955 c15.968,5.483,27.406,19.182,30.275,35.383l97.79-114.913C402.548,203.813,402.877,198.143,399.716,194.787z" />
                        <path class="st0"
                            d="M340.402,182.908c5.543,3.214,12.628,1.303,15.834-4.239c3.206-5.551,1.303-12.636-4.239-15.849 c-5.543-3.19-12.644-1.288-15.849,4.247C332.956,172.624,334.844,179.717,340.402,182.908z" />
                        <path class="st0"
                            d="M259.239,161.172c6.412,0,11.595-5.206,11.595-11.595c0-6.411-5.183-11.602-11.595-11.602 c-6.396,0-11.594,5.191-11.594,11.602C247.645,155.966,252.843,161.172,259.239,161.172z" />
                        <path class="st0"
                            d="M76.175,320.898c-6.726,0-12.209,5.468-12.209,12.209s5.482,12.194,12.209,12.194 c6.741,0,12.194-5.453,12.194-12.194S82.916,320.898,76.175,320.898z" />
                        <path class="st0"
                            d="M114.441,226.471c-5.542-3.206-12.643-1.289-15.849,4.254c-3.19,5.542-1.288,12.628,4.239,15.841 c5.558,3.206,12.658,1.296,15.864-4.247C121.886,236.776,119.984,229.677,114.441,226.471z" />
                        <path class="st0"
                            d="M166.497,162.82c-5.558,3.213-7.445,10.298-4.239,15.849c3.191,5.542,10.291,7.453,15.834,4.239 c5.543-3.19,7.445-10.299,4.254-15.841C179.141,161.531,172.04,159.629,166.497,162.82z" />
                        <path class="st0"
                            d="M404.038,226.471c-5.542,3.206-7.445,10.306-4.239,15.849c3.206,5.558,10.292,7.453,15.849,4.247 c5.542-3.213,7.445-10.299,4.239-15.841C416.696,225.182,409.595,223.265,404.038,226.471z" />
                        <path class="st0"
                            d="M433.144,335.062c6.412,0,11.595-5.184,11.595-11.587c0-6.412-5.183-11.61-11.595-11.61 c-6.411,0-11.594,5.198-11.594,11.61C421.55,329.878,426.733,335.062,433.144,335.062z" />
                    </g>
                </g>
            </svg>
        </div>
        <div class="w-full pl-2 ml-4">
            <span class="font-bold">Oddometer : </span>
            <input type="number" class="w-full rounded-lg" name="oddo_meter_out" id="oddo_meter_out" readonly>
            <br>
            <input type="checkbox" id="enableInput"> Checklist untuk dapat mengedit data jika ada selisih kilometer
        </div>
    </div>

    <div class="flex p-4 pt-8 pb-8 pl-6">
        <div class="flex items-center p-4 bg-blue-400 rounded-lg">
            <svg width="800px" height="800px" viewBox="0 0 48.001 48.001" xmlns="http://www.w3.org/2000/svg"
                fill="#000000" class="w-6 h-6">
                <g id="SVGRepo_bgCarrier" stroke-width="0" />
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                <g id="SVGRepo_iconCarrier">
                    <path id="area"
                        d="M189,471a5.005,5.005,0,0,1-5-5V428a5.006,5.006,0,0,1,5-5h38a5.006,5.006,0,0,1,5,5v38a5.005,5.005,0,0,1-5,5Zm27-2h11a3,3,0,0,0,3-3V455H216Zm-15,0h14V455H201Zm-15-3a3,3,0,0,0,3,3h11V455H186Zm30-12h14V440H216Zm-4.293,0H215v-3.292Zm-4,0H211l-.353-.353,4-4L215,450v-3.293Zm-4,0H207l-.354-.353,8-8L215,446v-3.293ZM201,454h2l-.353-.353,12-12L215,442v-2h-.29a6.88,6.88,0,0,0,.219-1H215V425H201v14h.071a7.047,7.047,0,0,0,.219,1H201v3.292l1.271-1.27a7.068,7.068,0,0,0,.635.779l-1.552,1.553L201,444v3.293l3.331-3.331a6.88,6.88,0,0,0,.932.482l-3.91,3.91L201,448v3.292l6.073-6.073-.848-2.545a5,5,0,1,1,3.55,0L208,448l-.573-1.72-6.073,6.073L201,452Zm-15,0h14V440H186Zm19-16a3,3,0,1,0,3-3A3,3,0,0,0,205,438Zm11,1h14V428a3,3,0,0,0-3-3H216Zm-30-11v11h14V425H189A3,3,0,0,0,186,428Z"
                        transform="translate(-184 -423)" fill="#ffffff" />
                </g>
            </svg>
        </div>
        <div class="w-full pl-2 ml-4">
            <span class="font-bold">Posisi sekarang : </span>
            <select class="w-full js-example-basic-single" name="area_awal_id">
                <option value="57">SPC Kresek</option>
                <option value="58">PCK 2</option>
                @foreach ($area as $k)
                @if ($k->div_area == $user->division)
                <option value="{{ $k->id }}">{{ $k->nama_area }}</option>
                @endif
                @endforeach
            </select>
        </div>
    </div>

    <div class="flex p-4 pt-8 pb-8 pl-6">
        <div class="flex items-center p-4 bg-blue-400 rounded-lg">
            <svg width="800px" height="800px" viewBox="0 0 48.001 48.001" xmlns="http://www.w3.org/2000/svg"
                fill="#000000" class="w-6 h-6">
                <g id="SVGRepo_bgCarrier" stroke-width="0" />
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                <g id="SVGRepo_iconCarrier">
                    <path id="area"
                        d="M189,471a5.005,5.005,0,0,1-5-5V428a5.006,5.006,0,0,1,5-5h38a5.006,5.006,0,0,1,5,5v38a5.005,5.005,0,0,1-5,5Zm27-2h11a3,3,0,0,0,3-3V455H216Zm-15,0h14V455H201Zm-15-3a3,3,0,0,0,3,3h11V455H186Zm30-12h14V440H216Zm-4.293,0H215v-3.292Zm-4,0H211l-.353-.353,4-4L215,450v-3.293Zm-4,0H207l-.354-.353,8-8L215,446v-3.293ZM201,454h2l-.353-.353,12-12L215,442v-2h-.29a6.88,6.88,0,0,0,.219-1H215V425H201v14h.071a7.047,7.047,0,0,0,.219,1H201v3.292l1.271-1.27a7.068,7.068,0,0,0,.635.779l-1.552,1.553L201,444v3.293l3.331-3.331a6.88,6.88,0,0,0,.932.482l-3.91,3.91L201,448v3.292l6.073-6.073-.848-2.545a5,5,0,1,1,3.55,0L208,448l-.573-1.72-6.073,6.073L201,452Zm-15,0h14V440H186Zm19-16a3,3,0,1,0,3-3A3,3,0,0,0,205,438Zm11,1h14V428a3,3,0,0,0-3-3H216Zm-30-11v11h14V425H189A3,3,0,0,0,186,428Z"
                        transform="translate(-184 -423)" fill="#ffffff" />
                </g>
            </svg>
        </div>
        <div class="w-full pl-2 ml-4">
            <span class="font-bold">Area Tujuan : </span><br>
            <select class="w-full js-example-basic-multiple" name="areas_id[]" multiple="multiple">
                <option value="57">SPC Kresek</option>
                <option value="58">PCK 2</option>
                @foreach ($area as $k)
                @if ($k->div_area == $user->division)
                <option value="{{ $k->id }}">{{ $k->nama_area }}</option>
                @endif
                @endforeach
            </select>
        </div>
    </div>

    <div class="flex p-4 pt-8 pb-8 pl-6">
        <div class="flex items-center p-4 bg-blue-400 rounded-lg">
            <svg viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" stroke="#000000" class="w-6 h-6">
                <g id="SVGRepo_bgCarrier" stroke-width="0" />
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                <g id="SVGRepo_iconCarrier">
                    <title>safety_certificate_fill</title>
                    <g id="页面-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="System" transform="translate(-430.000000, -240.000000)">
                            <g id="safety_certificate_fill" transform="translate(430.000000, 240.000000)">
                                <path
                                    d="M24,0 L24,24 L0,24 L0,0 L24,0 Z M12.5934901,23.257841 L12.5819402,23.2595131 L12.5108777,23.2950439 L12.4918791,23.2987469 L12.4918791,23.2987469 L12.4767152,23.2950439 L12.4056548,23.2595131 C12.3958229,23.2563662 12.3870493,23.2590235 12.3821421,23.2649074 L12.3780323,23.275831 L12.360941,23.7031097 L12.3658947,23.7234994 L12.3769048,23.7357139 L12.4804777,23.8096931 L12.4953491,23.8136134 L12.4953491,23.8136134 L12.5071152,23.8096931 L12.6106902,23.7357139 L12.6232938,23.7196733 L12.6232938,23.7196733 L12.6266527,23.7031097 L12.609561,23.275831 C12.6075724,23.2657013 12.6010112,23.2592993 12.5934901,23.257841 L12.5934901,23.257841 Z M12.8583906,23.1452862 L12.8445485,23.1473072 L12.6598443,23.2396597 L12.6498822,23.2499052 L12.6498822,23.2499052 L12.6471943,23.2611114 L12.6650943,23.6906389 L12.6699349,23.7034178 L12.6699349,23.7034178 L12.678386,23.7104931 L12.8793402,23.8032389 C12.8914285,23.8068999 12.9022333,23.8029875 12.9078286,23.7952264 L12.9118235,23.7811639 L12.8776777,23.1665331 C12.8752882,23.1545897 12.8674102,23.1470016 12.8583906,23.1452862 L12.8583906,23.1452862 Z M12.1430473,23.1473072 C12.1332178,23.1423925 12.1221763,23.1452606 12.1156365,23.1525954 L12.1099173,23.1665331 L12.0757714,23.7811639 C12.0751323,23.7926639 12.0828099,23.8018602 12.0926481,23.8045676 L12.108256,23.8032389 L12.3092106,23.7104931 L12.3186497,23.7024347 L12.3186497,23.7024347 L12.3225043,23.6906389 L12.340401,23.2611114 L12.337245,23.2485176 L12.337245,23.2485176 L12.3277531,23.2396597 L12.1430473,23.1473072 Z"
                                    id="MingCute" fill-rule="nonzero"> </path>
                                <path
                                    d="M11.2978,2.19533 C11.6939125,2.0467725 12.1254734,2.02820281 12.530448,2.13962094 L12.7022,2.19533 L19.7022,4.82033 C20.4308533,5.09354467 20.9298818,5.76181693 20.9931804,6.52752646 L21,6.69299 L21,12.0557 C21,15.3644353 19.185628,18.397435 16.2910032,19.9669788 L16.0249,20.1056 L12.6708,21.7826 C12.2954222,21.9703333 11.8610222,21.9911926 11.4725284,21.8451778 L11.3292,21.7826 L7.97508,20.1056 C5.01569824,18.6258412 3.11426678,15.6466349 3.00497789,12.3557015 L3,12.0557 L3,6.69299 C3,5.91488867 3.45049511,5.21294858 4.14521784,4.88481446 L4.29775,4.82033 L11.2978,2.19533 Z M15.4329,8.6291 L10.8348,13.2272 L9.06707,11.4594 C8.67654,11.0689 8.04338,11.0689 7.65285,11.4594 C7.26233,11.8499 7.26233,12.4831 7.65285,12.8736 L10.057,15.2778 C10.4866,15.7074 11.1831,15.7074 11.6127,15.2778 L16.8471,10.0433 C17.2377,9.65278 17.2377,9.01962 16.8471,8.6291 C16.4566,8.23857 15.8235,8.23857 15.4329,8.6291 Z"
                                    id="形状" fill="#ffffff"> </path>
                            </g>
                        </g>
                    </g>
                </g>
            </svg>
        </div>
        <div class="w-full pl-2 ml-4">
            <span class="font-bold">Safety Tools : </span>
            <select class="w-full js-example-basic-multiple" name="safetytools_id[]" multiple="multiple"
                id="safetyTools">
                @foreach ($safety as $k)
                <option value="{{ $k->id }}">{{ $k->nama_alat }}</option>
                @endforeach
            </select>
            <br>
            <input type="checkbox" id="checkbox"> Select All
        </div>
    </div>


    <div class="left-0 flex p-4 pt-8 pb-8 pl-6">
        <button type="submit" class="p-4 text-white bg-blue-500 rounded-lg">Kirim Data</button>
    </div>
</form>



@include('layouts.footerUser')