<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            สวัสดี , {{ Auth::user()->name }}
        </h2>
    </x-slot>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">

                        <div class="card">
                            <div class="card-header">แบบฟอร์ม</div>
                            <div class="card-body">
                                <form action="{{url('/department/update/'.$department->id)}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="department_name">ชื่อตำแหน่งงาน</label>
                                        <input type="text" class="form-control" name="department_name"id=""
                                            value=" {{ $department->department_name }}">
                                    </div>
                                    @error('department_name')
                                        <div class="my-2">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                    <input type="submit" value="อัพเดต" class="btn btn-primary mt-2">
                                </form>

                            </div>
                        </div>
                    </div>
                    <div>

                    </div>
                </div>
                {{-- @foreach ($users as $row)
                    <p>{{ $row->name }}</p>
                @endforeach --}}
            </div>

        </div>
</x-app-layout>
