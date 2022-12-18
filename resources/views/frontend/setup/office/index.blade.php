@extends('layouts.Backend.app')

@section('content')
    <section>
        <div class="container">
            <div class="card text-center">
                <div class="card-header">
                    <h6>Office</h6>
                </div>

            </div>
        </div>
    </section>

    <div class="main-content">

        <div class="container">
            <table id="tree-table" class="table table-hover table-bordered">
                <tbody>
                    <th>#</th>
                    <th>Test</th>
                    <tr data-id="1" data-parent="0" data-level="1">
                        <td data-column="name">Node 1</td>
                        <td>Additional info</td>
                    </tr>
                    <tr data-id="2" data-parent="1" data-level="2">
                        <td data-column="name">Node 1</td>
                        <td>Additional info</td>
                    </tr>
                    <tr data-id="3" data-parent="1" data-level="2">
                        <td data-column="name">Node 1</td>
                        <td>Additional info</td>
                    </tr>
                    <tr data-id="4" data-parent="3" data-level="3">
                        <td data-column="name">Node 1</td>
                        <td>Additional info</td>
                    </tr>
                    <tr data-id="5" data-parent="3" data-level="3">
                        <td data-column="name">Node 1</td>
                        <td>Additional info</td>
                    </tr>
                </tbody>
    
            </table>
        </div>

       


    </div>
@endsection
