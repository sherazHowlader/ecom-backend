@extends('backend.partials.app')

@section('title','Dashboard')

@section('content')
<div class="app-page-title">
  <div class="page-title-wrapper">
    <div class="page-title-heading">
      <div class="page-title-icon">
        <i class="fas fa-home"></i>
      </div>
      <div style="font-variant: small-caps"> <b> {{ Auth::user()->mess_name }} </b> </div>
    </div>

  </div>
</div>
<div class="main-card mb-3 card">
  <div class="card-body">
    <div class="row">
      <div class="col-md-6 col-xl-6">
        <div class="card mb-3 widget-content bg-deposits-bloom">
          <div class="widget-content-wrapper text-white">
            <div class="widget-content-left">
              <div class="widget-heading"> মোট জমা </div>
              <div class="widget-subheading"> Total Deposits </div>
            </div>
            <div class="widget-content-right">
              <div class="widget-numbers text-white">
                <span>
                  @foreach ($dashB as $key => $value)
                  {{ $value->deposit_tk }}
                  @endforeach
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xl-6">
        <div class="card mb-3 widget-content bg-midnight-bloom">
          <div class="widget-content-wrapper text-white">
            <div class="widget-content-left">
              <div class="widget-heading"> বাজার খরচ </div>
              <div class="widget-subheading"> Whole Month Cost </div>
            </div>
            <div class="widget-content-right">
              <div class="widget-numbers text-white">
                <span>
                  @foreach ($dashB as $key => $value)
                  {{ $value->market_cost }}
                  @endforeach
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class=" col-md-6 col-xl-6">
        <div class="card mb-3 widget-content bg-premium-dark">
          <div class="widget-content-wrapper text-white">
            <div class="widget-content-left">
              <div class="widget-heading"> অন্যান্য খরচ </div>
              <div class="widget-subheading">
                Extra Cost / Total Member
              </div>
            </div>
            <div class="widget-content-right">
              <div class="widget-numbers text-warning">
                <span>
                  @foreach ($dashB as $key => $value)
                    {{ substr($value->extra_cost / $mCount,0,7) }}
                  @endforeach
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class=" col-md-6 col-xl-6">
        <div class="card mb-3 widget-content bg-member-dark">
          <div class="widget-content-wrapper text-white">
            <div class="widget-content-left">
              <div class="widget-heading"> সদস্য সংখ্যা </div>
              <div class="widget-subheading">
                Total Member
              </div>
            </div>
            <div class="widget-content-right">
              <div class="widget-numbers text-white">
                <span>
                  {{ $mCount }}
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xl-6">
        <div class="card mb-3 widget-content bg-arielle-smile">
          <div class="widget-content-wrapper text-white">
            <div class="widget-content-left">
              <div class="widget-heading"> মোট মিল </div>
              <div class="widget-subheading"> All Member Total Meal </div>
            </div>
            <div class="widget-content-right">
              <div class="widget-numbers text-white">
                <span>
                  @foreach ($dashB as $key => $value)
                  {{ $value->totalMeal }}
                  @endforeach
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xl-6">
        <div class="card mb-3 widget-content bg-grow-early">
          <div class="widget-content-wrapper text-white">
            <div class="widget-content-left">
              <div class="widget-heading"> মিল রেট </div>
              <div class="widget-subheading">
                Market Cost / Total Meal
              </div>
            </div>
            <div class="widget-content-right">
              <div class="widget-numbers text-white">
                <span>
                  @foreach ($dashB as $key => $value)
                    @if ($value->totalMeal > 0)
                      {{ substr($value->market_cost / $value->totalMeal,0,5), session()->put('mealRate',$value->market_cost / $value->totalMeal)}}
                    @endif
                  @endforeach
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection