<x-layout>
    <div class="card mb-4 mt-5">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-2 mt-2">
                <h3 class="text-secondary"><strong>Buat Akun Mahasiswa</strong></h3>
                <a href="{{ route('add-mahasiswa-create') }}" type="button" class="btn btn-primary mb-4">
                    + Buat Akun Mahasiswa
                </a>
            </div>
            <div class="table-responsive">
                <table id="userTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">NIM</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Jurusan</th>
                            <th class="text-center">Angkatan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
