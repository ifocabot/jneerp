@include('layouts.layoutUser')

<h1 class="pt-4 pl-4 text-2xl font-bold">Form Check List Kendaraan</h1>

<form action="{{ route('prosesinputbensin') }}" method="POST" enctype="multipart/form-data">
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
            <span class="font-bold">Kondisi Body Sebelah kanan :</span>
            <div class="flex pt-3">
                <div class="flex items-center me-4">
                    <input id="inline-radio" type="radio" value="1" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="inline-radio" class="text-sm font-medium text-gray-900 ms-2 ">Baik</label>
                </div>
                <div class="flex items-center me-4">
                    <input id="inline-2-radio" type="radio" value="2" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="inline-2-radio" class="text-sm font-medium text-gray-900 ms-2">Kurang
                        Baik</label>
                </div>
                <div class="flex items-center me-4">
                    <input type="radio" value="3" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label class="text-sm font-medium text-gray-900 ms-2">Buruk</label>
                </div>
            </div>
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
            <span class="font-bold">Kondisi Ban Kanan Belakang :</span>
            <div class="flex pt-3">
                <div class="flex items-center me-4">
                    <input id="inline-radio" type="radio" value="1" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="inline-radio" class="text-sm font-medium text-gray-900 ms-2 ">Baik</label>
                </div>
                <div class="flex items-center me-4">
                    <input id="inline-2-radio" type="radio" value="2" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="inline-2-radio" class="text-sm font-medium text-gray-900 ms-2">Kurang
                        Baik</label>
                </div>
                <div class="flex items-center me-4">
                    <input type="radio" value="3" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label class="text-sm font-medium text-gray-900 ms-2">Buruk</label>
                </div>
            </div>
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
            <span class="font-bold">Kondisi Ban Kanan Depan :</span>
            <div class="flex pt-3">
                <div class="flex items-center me-4">
                    <input id="inline-radio" type="radio" value="1" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="inline-radio" class="text-sm font-medium text-gray-900 ms-2 ">Baik</label>
                </div>
                <div class="flex items-center me-4">
                    <input id="inline-2-radio" type="radio" value="2" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="inline-2-radio" class="text-sm font-medium text-gray-900 ms-2">Kurang
                        Baik</label>
                </div>
                <div class="flex items-center me-4">
                    <input type="radio" value="3" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label class="text-sm font-medium text-gray-900 ms-2">Buruk</label>
                </div>
            </div>
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
            <span class="font-bold">Kondisi Body Depan :</span>
            <div class="flex pt-3">
                <div class="flex items-center me-4">
                    <input id="inline-radio" type="radio" value="1" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="inline-radio" class="text-sm font-medium text-gray-900 ms-2 ">Baik</label>
                </div>
                <div class="flex items-center me-4">
                    <input id="inline-2-radio" type="radio" value="2" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="inline-2-radio" class="text-sm font-medium text-gray-900 ms-2">Kurang
                        Baik</label>
                </div>
                <div class="flex items-center me-4">
                    <input type="radio" value="3" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label class="text-sm font-medium text-gray-900 ms-2">Buruk</label>
                </div>
            </div>
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
            <span class="font-bold">Kondisi Lampu Sein Depan Kiri :</span>
            <div class="flex pt-3">
                <div class="flex items-center me-4">
                    <input id="inline-radio" type="radio" value="1" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="inline-radio" class="text-sm font-medium text-gray-900 ms-2 ">Baik</label>
                </div>
                <div class="flex items-center me-4">
                    <input id="inline-2-radio" type="radio" value="2" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="inline-2-radio" class="text-sm font-medium text-gray-900 ms-2">Kurang
                        Baik</label>
                </div>
                <div class="flex items-center me-4">
                    <input type="radio" value="3" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label class="text-sm font-medium text-gray-900 ms-2">Buruk</label>
                </div>
            </div>
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
            <span class="font-bold">Kondisi Lampu Sein Depan Kanan:</span>
            <div class="flex pt-3">
                <div class="flex items-center me-4">
                    <input id="inline-radio" type="radio" value="1" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="inline-radio" class="text-sm font-medium text-gray-900 ms-2 ">Baik</label>
                </div>
                <div class="flex items-center me-4">
                    <input id="inline-2-radio" type="radio" value="2" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="inline-2-radio" class="text-sm font-medium text-gray-900 ms-2">Kurang
                        Baik</label>
                </div>
                <div class="flex items-center me-4">
                    <input type="radio" value="3" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label class="text-sm font-medium text-gray-900 ms-2">Buruk</label>
                </div>
            </div>
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
            <span class="font-bold">Kondisi Lampu Utama Depan Kiri</span>
            <div class="flex pt-3">
                <div class="flex items-center me-4">
                    <input id="inline-radio" type="radio" value="1" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="inline-radio" class="text-sm font-medium text-gray-900 ms-2 ">Baik</label>
                </div>
                <div class="flex items-center me-4">
                    <input id="inline-2-radio" type="radio" value="2" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="inline-2-radio" class="text-sm font-medium text-gray-900 ms-2">Kurang
                        Baik</label>
                </div>
                <div class="flex items-center me-4">
                    <input type="radio" value="3" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label class="text-sm font-medium text-gray-900 ms-2">Buruk</label>
                </div>
            </div>
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
            <span class="font-bold">Kondisi Lampu Utama Depan Kanan:</span>
            <div class="flex pt-3">
                <div class="flex items-center me-4">
                    <input id="inline-radio" type="radio" value="1" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="inline-radio" class="text-sm font-medium text-gray-900 ms-2 ">Baik</label>
                </div>
                <div class="flex items-center me-4">
                    <input id="inline-2-radio" type="radio" value="2" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="inline-2-radio" class="text-sm font-medium text-gray-900 ms-2">Kurang
                        Baik</label>
                </div>
                <div class="flex items-center me-4">
                    <input type="radio" value="3" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label class="text-sm font-medium text-gray-900 ms-2">Buruk</label>
                </div>
            </div>
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
            <span class="font-bold"> Kondisi Kaca :</span>
            <div class="flex pt-3">
                <div class="flex items-center me-4">
                    <input id="inline-radio" type="radio" value="1" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="inline-radio" class="text-sm font-medium text-gray-900 ms-2 ">Baik</label>
                </div>
                <div class="flex items-center me-4">
                    <input id="inline-2-radio" type="radio" value="2" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="inline-2-radio" class="text-sm font-medium text-gray-900 ms-2">Kurang
                        Baik</label>
                </div>
                <div class="flex items-center me-4">
                    <input type="radio" value="3" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label class="text-sm font-medium text-gray-900 ms-2">Buruk</label>
                </div>
            </div>
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
            <span class="font-bold">Kondisi Body Sebelah Kiri :</span>
            <div class="flex pt-3">
                <div class="flex items-center me-4">
                    <input id="inline-radio" type="radio" value="1" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="inline-radio" class="text-sm font-medium text-gray-900 ms-2 ">Baik</label>
                </div>
                <div class="flex items-center me-4">
                    <input id="inline-2-radio" type="radio" value="2" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="inline-2-radio" class="text-sm font-medium text-gray-900 ms-2">Kurang
                        Baik</label>
                </div>
                <div class="flex items-center me-4">
                    <input type="radio" value="3" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label class="text-sm font-medium text-gray-900 ms-2">Buruk</label>
                </div>
            </div>
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
            <span class="font-bold">Kondisi Ban Kiri Depan :</span>
            <div class="flex pt-3">
                <div class="flex items-center me-4">
                    <input id="inline-radio" type="radio" value="1" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="inline-radio" class="text-sm font-medium text-gray-900 ms-2 ">Baik</label>
                </div>
                <div class="flex items-center me-4">
                    <input id="inline-2-radio" type="radio" value="2" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="inline-2-radio" class="text-sm font-medium text-gray-900 ms-2">Kurang
                        Baik</label>
                </div>
                <div class="flex items-center me-4">
                    <input type="radio" value="3" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label class="text-sm font-medium text-gray-900 ms-2">Buruk</label>
                </div>
            </div>
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
            <span class="font-bold">Kondisi Ban Kiri Belakang :</span>
            <div class="flex pt-3">
                <div class="flex items-center me-4">
                    <input id="inline-radio" type="radio" value="1" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="inline-radio" class="text-sm font-medium text-gray-900 ms-2 ">Baik</label>
                </div>
                <div class="flex items-center me-4">
                    <input id="inline-2-radio" type="radio" value="2" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="inline-2-radio" class="text-sm font-medium text-gray-900 ms-2">Kurang
                        Baik</label>
                </div>
                <div class="flex items-center me-4">
                    <input type="radio" value="3" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label class="text-sm font-medium text-gray-900 ms-2">Buruk</label>
                </div>
            </div>
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
            <span class="font-bold">Kondisi Lampu Belakang Sein Kiri :</span>
            <div class="flex pt-3">
                <div class="flex items-center me-4">
                    <input id="inline-radio" type="radio" value="1" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="inline-radio" class="text-sm font-medium text-gray-900 ms-2 ">Baik</label>
                </div>
                <div class="flex items-center me-4">
                    <input id="inline-2-radio" type="radio" value="2" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="inline-2-radio" class="text-sm font-medium text-gray-900 ms-2">Kurang
                        Baik</label>
                </div>
                <div class="flex items-center me-4">
                    <input type="radio" value="3" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label class="text-sm font-medium text-gray-900 ms-2">Buruk</label>
                </div>
            </div>
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
            <span class="font-bold">Kondisi Lampu Belakang Sein Kanan :</span>
            <div class="flex pt-3">
                <div class="flex items-center me-4">
                    <input id="inline-radio" type="radio" value="1" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="inline-radio" class="text-sm font-medium text-gray-900 ms-2 ">Baik</label>
                </div>
                <div class="flex items-center me-4">
                    <input id="inline-2-radio" type="radio" value="2" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="inline-2-radio" class="text-sm font-medium text-gray-900 ms-2">Kurang
                        Baik</label>
                </div>
                <div class="flex items-center me-4">
                    <input type="radio" value="3" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label class="text-sm font-medium text-gray-900 ms-2">Buruk</label>
                </div>
            </div>
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
            <span class="font-bold">Kondisi Lampu Belakang Utama Kiri :</span>
            <div class="flex pt-3">
                <div class="flex items-center me-4">
                    <input id="inline-radio" type="radio" value="1" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="inline-radio" class="text-sm font-medium text-gray-900 ms-2 ">Baik</label>
                </div>
                <div class="flex items-center me-4">
                    <input id="inline-2-radio" type="radio" value="2" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="inline-2-radio" class="text-sm font-medium text-gray-900 ms-2">Kurang
                        Baik</label>
                </div>
                <div class="flex items-center me-4">
                    <input type="radio" value="3" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label class="text-sm font-medium text-gray-900 ms-2">Buruk</label>
                </div>
            </div>
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
            <span class="font-bold">Kondisi Lampu Belakang Utama Kanan :</span>
            <div class="flex pt-3">
                <div class="flex items-center me-4">
                    <input id="inline-radio" type="radio" value="1" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="inline-radio" class="text-sm font-medium text-gray-900 ms-2 ">Baik</label>
                </div>
                <div class="flex items-center me-4">
                    <input id="inline-2-radio" type="radio" value="2" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="inline-2-radio" class="text-sm font-medium text-gray-900 ms-2">Kurang
                        Baik</label>
                </div>
                <div class="flex items-center me-4">
                    <input type="radio" value="3" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label class="text-sm font-medium text-gray-900 ms-2">Buruk</label>
                </div>
            </div>
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
            <span class="font-bold">Ban Serep / Stip / Pengganti :</span>
            <div class="flex pt-3">
                <div class="flex items-center me-4">
                    <input id="inline-radio" type="radio" value="1" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="inline-radio" class="text-sm font-medium text-gray-900 ms-2 ">Baik</label>
                </div>
                <div class="flex items-center me-4">
                    <input id="inline-2-radio" type="radio" value="2" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label for="inline-2-radio" class="text-sm font-medium text-gray-900 ms-2">Kurang
                        Baik</label>
                </div>
                <div class="flex items-center me-4">
                    <input type="radio" value="3" name="kondisi-ban"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                    <label class="text-sm font-medium text-gray-900 ms-2">Buruk</label>
                </div>
            </div>
        </div>

    </div>
    <div class="left-0 flex p-4 pt-8 pb-8 pl-6">
        <button type="submit" class="p-4 text-white bg-blue-500 rounded-lg">Kirim</button>
    </div>
</form>


@include('layouts.footerUser')