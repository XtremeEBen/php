class B {
    public function method_from_b($s) {
        echo $s;
    }
}

class C {
    public function method_from_c($s) {
        echo $s;
    }
}

class A extends B
{
  private $c;

  public function __construct()
  {
    $this->c = new C;
  }

  // fake "extends C" using magic function
  public function __call($method, $args)
  {
    $this->c->$method($args[0]);
  }
}


$a = new A;
$a->method_from_b("abc");
$a->method_from_c("def");

got @ https://stackoverflow.com/a/356431/2835019
