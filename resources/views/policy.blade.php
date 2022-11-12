@extends('layouts.main')

@section('content')
    <main class="page">
        <section class="policy pt pb">
            <div class="policy__container">
                <h1 class="policy__title title">{{ $policy->title }}</h1>
                <div class="policy__body">
                    {!! $policy->text !!}
                </div>
            </div>
        </section>
    </main>
@endsection
