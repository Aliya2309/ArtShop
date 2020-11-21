<form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Logout') }}
                    </x-jet-responsive-nav-link>
                </form>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
            <?php $user=auth()->user();
            
             ?>
                <div class="card-body">
                   <h3> HELLO <?php echo $user->name;?> !! </h3>
                    
                </div>

                <h4>YOUR PRODUCTS: </h4>
                @foreach($ite as $i)
                <div> {{$i->name}}</div>
                <div> {{$i->description}}</div>
                <div> {{$i->category}}</div>
                <div> {{$i->price}}</div>
                <div><a href="deleted/{{$i['id']}}">Delete this item</a></div>
                </form>
                @endforeach

                <h4>ADD A NEW PRODUCT: </h4>
                <form action="added" method="post">
                
                    <label > Item Name <label>
                    <input type="text" name="item_name"><br><br>
                    <label > Description <label>
                    <input type="text" name="description"><br><br>
                    <label > Category <label>
                    <input type="text" name="category"><br><br>
                    <label > Price <label>
                    <input type="int" name="price"><br><br>
                    
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>