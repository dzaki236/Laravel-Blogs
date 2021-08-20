<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal For Writters-->
<div class="modal fade" id="writtersmodals" tabindex="-1" aria-labelledby="writter" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="writter">Mode Penulis?</h5>
                <p class="modal-title">Baca Peraturan di bawah ini</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Aturan 1 </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                Anda Bisa menulis postingan,namun harap untuk berhati hati dalam menulis konten untuk
                                potingan
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                    Aturan 2 </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                Konten yang di tulis tidak boleh mengandung kebencian,sara,dan rasis,serta gunakan
                                bahasa yang sopan dan sesuai kategori,lalu bila melanggar admin akan menindak lanjuti
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                    data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    Aturan tindak lanjut </button>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                Bila melanggar admin akan menindak lanjuti,dan memberikan aturan ringan,mulai dari
                                menonaktifkan akun pengguna secara sementara, hingga menghapus pengguna secara permanen
                            </div>
                        </div>
                    </div>
                    <hr>
                    @if (Auth::check())
                        @php
                            $id = Auth::user()->id;
                        @endphp
                        <form action="{{ route('edit-role', $id) }}" method="post">
                          @csrf 
                          @method('PUT')
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1" name="role"
                                value="writters">
                            <label class="form-check-label" for="gridCheck1">
                                <b>Saya setuju dengan peraturan,</b>rubah saya menjadi penulis </label>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2 mb-2">Save</button>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
