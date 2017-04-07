<?php

use Illuminate\Database\Seeder;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $plan1= new App\Plan;
        $plan1->plan_type="Monthly";
        $plan1->plan_cost=1900;
        $plan1->description="This plan is valid for one month";
        $plan1->status="Active";
        $plan1->save();

        $plan2= new App\Plan;
        $plan2->plan_type="Half Yearly";
        $plan2->plan_cost=4900;
        $plan2->description="This plan is valid for six month";
        $plan2->status="Active";
        $plan2->save();

        $plan3= new App\Plan;
        $plan3->plan_type="Yearly";
        $plan3->plan_cost=9900;
        $plan3->description="This plan is valid for Twelve month";
        $plan3->status="Active";
        $plan3->save();
    }
}
