@extends('front.app')

@section('title', 'Nosotros')

@section('content')
    <!-- Page Title-->
  <div class="page-title">
    <div class="container">
      <div class="column">
        <h1>Help / FAQ</h1>
      </div>
      <div class="column">
        <ul class="breadcrumbs">
          <li><a href="/">Home</a>
          </li>
          <li class="separator">&nbsp;</li>
          <li>Help / FAQ</li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Page Content-->
  <div class="container padding-bottom-3x">
    <div class="row">
      <!-- Side Menu-->

      <!-- Content-->
      <div class=" offset-2 col-lg-8 col-md-8">
        <div class="accordion" id="accordion" role="tablist">
          <div class="card">
            <div class="card-header" role="tab">
              <h6><a href="#collapseOne" data-toggle="collapse" data-parent="#accordion">What payment methods do you accept?</a></h6>
            </div>
            <div class="collapse show" id="collapseOne" role="tabpanel">
              <div class="card-body">
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, harum. Asperiores mollitia sed ullam quae blanditiis explicabo, reprehenderit sint rerum, labore, fugit obcaecati laboriosam nulla voluptatem inventore nobis esse nemo.</p>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" role="tab">
              <h6><a class="collapsed" href="#collapseTwo" data-toggle="collapse" data-parent="#accordion">How long will delivery take?</a></h6>
            </div>
            <div class="collapse" id="collapseTwo" role="tabpanel">
              <div class="card-body">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" role="tab">
              <h6><a class="collapsed" href="#collapseThree" data-toggle="collapse" data-parent="#accordion">Do you ship internationally?</a></h6>
            </div>
            <div class="collapse" id="collapseThree" role="tabpanel">
              <div class="card-body">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" role="tab">
              <h6><a class="collapsed" href="#collapseFour" data-toggle="collapse" data-parent="#accordion">Do I need an account to place an order?</a></h6>
            </div>
            <div class="collapse" id="collapseFour" role="tabpanel">
              <div class="card-body">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" role="tab">
              <h6><a class="collapsed" href="#collapseFive" data-toggle="collapse" data-parent="#accordion">Do you have discounts for returning customers?</a></h6>
            </div>
            <div class="collapse" id="collapseFive" role="tabpanel">
              <div class="card-body">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" role="tab">
              <h6><a class="collapsed" href="#collapseSix" data-toggle="collapse" data-parent="#accordion">How can I track my order?</a></h6>
            </div>
            <div class="collapse" id="collapseSix" role="tabpanel">
              <div class="card-body">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" role="tab">
              <h6><a class="collapsed" href="#collapseSeven" data-toggle="collapse" data-parent="#accordion">What are the product refund conditions?</a></h6>
            </div>
            <div class="collapse" id="collapseSeven" role="tabpanel">
              <div class="card-body">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
