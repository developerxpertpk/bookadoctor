<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Plan;
class SubscriptionController extends Controller
{
public function __construct()
{
$this->middleware('auth:admin');
}
public function index()
{
    $plan = Plan::all();
    return view('admin.plancrud',compact('plan'));
    die('hahha');
}
public function create()
{
    return view('admin.plancreate');
}
public function store(Request $request)
{
    $this->validate($request, [
'name' => 'required',
'description' => 'required',
'amount' => 'required',
]);
    $adminnew = new Plan;
    $adminnew->name = $request->name;
    $adminnew->amount = $request->amount;
    $adminnew->description = $request->description;
    $adminnew->save();
    return redirect()->route('subscription.list');
}
public function edit($id)
{
$plan = Plan::find($id);
return view('admin.plancreate',compact('plan','id'));
}
public function update1(Request $request, $id)
{
Plan::find($id)->update($request->all());
return redirect()->route('subscription.list')->with('success','Plan Updated');;
}
public function delete($id)
{
Plan::find($id)->delete();
return redirect()->route('subscription.list')
->with('success','Plan Deleted');
}
}