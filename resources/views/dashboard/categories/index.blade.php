
@extends('dashboard.layout.main')

@Section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Halaman Categories</h1>
</div>
<div class="table-responsive col-lg-11">

  @if (session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <a href="/dashboard/categories/create" class="btn btn-primary mb-2"> Add </a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $barang)
          
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td >{{ $barang->nama }}</td>

        <td> 
          <button class="badge bg-info border-0 d-inline" data-bs-toggle="modal" data-bs-target="#exampleModal" ><span data-feather="eye"></span></button>
          {{-- <button action="" ><span ></span></button> --}}
          
          <a href="/dashboard/inventarisasi/{{ $barang->id }}/edit" class="badge bg-warning border-0 d-inline"><span data-feather="edit"></span></a>
          <form action="/dashboard/inventarisasi/{{ $barang->id }}" class="d-inline" method="POST">
            @csrf
            @method('DELETE')
            <button class="badge bg-danger border-0" onclick="return confirm('Yakin Ingin Menghapus Data? {{ $barang->nama }}')"><span data-feather="x-circle"></span></button>
          </form>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Inventarisasi {{ $barang->nama }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <h3 class="fw-normal">Nama : {{ $barang->nama }}</h3>
                <h3 class="fw-normal">Kode :{{ $barang->kode_barang }}</h3>
                <h3 class="fw-normal">Kategori :{{ $barang->kategori->nama }}</h3>
                <h3 class="fw-normal">Status : {{ $barang->status->status }}</h3>
                <h3 class="fw-normal">Jumlah : {{$barang->jumlah }}</h3>
                <div class="container">
                  <h3 class="fw-normal">Keterangan : Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam, dicta, obcaecati vero provident natus vitae atque harum laboriosam, nulla rem suscipit nemo? Maxime nostrum tenetur autem non at repudiandae cupiditate fuga, ipsa fugit perspiciatis vel minus ex. Vel, mollitia. Enim quae ipsa qui eveniet ad corporis consequuntur laborum ab, quis quidem delectus nesciunt pariatur accusamus modi dolorum, praesentium ducimus inventore ipsam et architecto eum quam culpa! Eaque aliquam, velit temporibus doloribus ipsam consectetur officiis fugiat consequuntur, cupiditate rem quidem sequi fuga magni doloremque obcaecati porro recusandae voluptatibus iste. Eligendi, placeat? Debitis libero quidem recusandae similique. Cum ex soluta aliquid eum laboriosam odit, ullam, officia nemo ratione adipisci sint sit, dolore rerum quas fuga laudantium reprehenderit. Repudiandae ducimus et fugit tenetur optio, magni vitae nam aspernatur fugiat nostrum vel inventore porro obcaecati, esse consectetur expedita distinctio doloremque soluta quo rerum eius nobis labore eos modi. Nisi, fuga deleniti modi veritatis aliquid illum dolore ad! Asperiores inventore itaque impedit doloribus, unde aut culpa. Laboriosam consectetur sunt delectus est architecto beatae laborum dicta laudantium eaque aperiam cumque consequuntur recusandae, dolore eligendi ad animi ex exercitationem, accusamus cum dolor? Minima aliquam nostrum aliquid incidunt magni molestias quibusdam laboriosam maiores repellendus porro libero ullam asperiores placeat doloremque, corrupti dolor natus corporis sint! Adipisci ab ratione placeat neque natus sint dolorem voluptatibus. At aliquid iusto expedita impedit, ea officia dicta pariatur dolores voluptates quae, cumque numquam consequatur libero autem adipisci. Ducimus eligendi minus quidem temporibus, sed molestiae corrupti at excepturi dolores autem, repellendus ex iure incidunt vel debitis dolorem accusamus tempora! Cupiditate assumenda quos tempora tempore magnam? Quis soluta optio voluptates sint consectetur, autem explicabo quas nisi dignissimos natus facere aliquam, eveniet eum accusantium eius dolore ipsam hic tempora exercitationem quae officia. Commodi tempora fugit, porro nihil maxime ab esse sunt excepturi iste suscipit a blanditiis fuga perspiciatis hic provident sed molestiae voluptate consequatur libero itaque mollitia minima deleniti quas! Cumque assumenda officiis non ut nesciunt ratione perferendis sint dolor nobis totam, nostrum aspernatur quasi officia quidem nisi! Vero cupiditate unde ullam quo ducimus repellat adipisci neque corrupti, dolor fuga accusamus sunt, soluta libero! In vel eius accusantium sunt asperiores neque est ut! Neque suscipit esse maiores nulla fugiat quae quod, tenetur soluta atque corporis ipsa sapiente ab fuga dolore veritatis culpa in aliquam consequuntur facilis iste adipisci. Velit ad, recusandae voluptatibus vel laboriosam modi ipsum nam! Molestiae, culpa? Itaque recusandae debitis, optio quae temporibus ad ab, voluptates dolore doloribus, iusto pariatur! Minus necessitatibus quisquam ipsa suscipit dolore fugit, laudantium in dolores incidunt et est velit? Commodi quas sequi fugit, repellat iure nemo at temporibus voluptate accusamus distinctio quibusdam aliquid facere veniam dolores delectus ea cum adipisci cupiditate eum autem ut in. Optio nobis soluta tempore, magnam facere at nostrum a aliquid fuga. Expedita, illum distinctio vitae maxime praesentium nulla laudantium dicta itaque nisi ratione rem veniam explicabo, blanditiis error. Expedita cumque accusamus recusandae error eum numquam aperiam nam? Deleniti quos amet obcaecati ut cum! Atque tempora quod ratione ea consequuntur nulla ut, nostrum nesciunt laboriosam?</h3>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
{{ $categories->links() }}

@endsection