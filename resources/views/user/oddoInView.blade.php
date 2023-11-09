@include('layouts.layoutUser')

<!-- Check for success message -->
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<!-- Check for error message -->
@if(session('error'))
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
        {{ session('error') }}
    </div>
</div>
@endif

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

<h1 class="pt-4 pl-4 text-2xl font-bold">FORM SAMPAI</h1>

<form action="{{ route('oddoInPost') }}" method="POST" enctype="multipart/form-data">
    @csrf
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
            <span class="font-bold">Kilometer : </span>
            <input type="number" class="w-full rounded-lg" name="oddo_meter_in">
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
            <span class="font-bold">Area : </span>
            <select class="w-full js-example-basic-single" name="areas_id">
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
            <button id="startButton" type="button" onclick="toggleCamera()">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6">
                    <g id="SVGRepo_bgCarrier" stroke-width="0" />
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                    <g id="SVGRepo_iconCarrier">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M9.77778 21H14.2222C17.3433 21 18.9038 21 20.0248 20.2646C20.51 19.9462 20.9267 19.5371 21.251 19.0607C22 17.9601 22 16.4279 22 13.3636C22 10.2994 22 8.76721 21.251 7.6666C20.9267 7.19014 20.51 6.78104 20.0248 6.46268C19.3044 5.99013 18.4027 5.82123 17.022 5.76086C16.3631 5.76086 15.7959 5.27068 15.6667 4.63636C15.4728 3.68489 14.6219 3 13.6337 3H10.3663C9.37805 3 8.52715 3.68489 8.33333 4.63636C8.20412 5.27068 7.63685 5.76086 6.978 5.76086C5.59733 5.82123 4.69555 5.99013 3.97524 6.46268C3.48995 6.78104 3.07328 7.19014 2.74902 7.6666C2 8.76721 2 10.2994 2 13.3636C2 16.4279 2 17.9601 2.74902 19.0607C3.07328 19.5371 3.48995 19.9462 3.97524 20.2646C5.09624 21 6.65675 21 9.77778 21ZM12 9.27273C9.69881 9.27273 7.83333 11.1043 7.83333 13.3636C7.83333 15.623 9.69881 17.4545 12 17.4545C14.3012 17.4545 16.1667 15.623 16.1667 13.3636C16.1667 11.1043 14.3012 9.27273 12 9.27273ZM12 10.9091C10.6193 10.9091 9.5 12.008 9.5 13.3636C9.5 14.7192 10.6193 15.8182 12 15.8182C13.3807 15.8182 14.5 14.7192 14.5 13.3636C14.5 12.008 13.3807 10.9091 12 10.9091ZM16.7222 10.0909C16.7222 9.63904 17.0953 9.27273 17.5556 9.27273H18.6667C19.1269 9.27273 19.5 9.63904 19.5 10.0909C19.5 10.5428 19.1269 10.9091 18.6667 10.9091H17.5556C17.0953 10.9091 16.7222 10.5428 16.7222 10.0909Z"
                            fill="#ffffff" />
                    </g>
                </svg>
            </button>
        </div>
        @if(Auth::user()->user_low_end == 1)
        <div class="ml-4">
            <span class="font-bold">upload : </span>
            <br>
            <input type="file" accept="image/*" name="image">
        </div>
        @else
        <div class="ml-4">
            <span class="font-bold">Foto : </span>
            <input type="file" accept="image/*" name="image" capture>
        </div>
        @endif
    </div>

    <div class="left-0 flex p-4 pt-8 pb-8 pl-6">
        <button type="submit" class="p-4 text-white bg-blue-500 rounded-lg">Kirim</button>
    </div>
</form>


@include('layouts.footerUser')