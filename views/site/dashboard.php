<?php

use app\assets\DashboardAsset;
use app\models\MembersSearch;
use app\models\Utils;
use richardfan\widget\JSRegister;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Pjax;

/** @var View $this */
/** @var MembersSearch $searchModel */
/** @var ActiveDataProvider $dataProvider */
$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
DashboardAsset::register($this);
?>

<?php Pjax::begin(); ?>

<div class="row">

         

                    <!-- members stats -->
                    


                     
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h6 class="">Total Members</h6>
                                                        <h2 class="mb-0 number-font"><?= $totalMembers ?></h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <div class="chart-wrapper mt-1">
                                                            <canvas id="saleschart"
                                                                class="h-8 w-9 chart-dropshadow"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="text-muted fs-12"><span class="text-secondary"><i
                                                            class="fe fe-arrow-up-circle  text-secondary"></i> 5%</span>
                                                    Last week</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h6 class="">Crypto Members</h6>
                                                        <h2 class="mb-0 number-font"><?= $totalMembersCrypto ?></h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <div class="chart-wrapper mt-1">
                                                            <canvas id="leadschart"
                                                                class="h-8 w-9 chart-dropshadow"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="text-muted fs-12"><span class="text-pink"><i
                                                            class="fe fe-arrow-down-circle text-pink"></i> 0.75%</span>
                                                    Last 6 days</span>
                                            </div>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                               <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                                <div class="row">
                                      <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h6 class="">Forex Members</h6>
                                                        <h2 class="mb-0 number-font"><?= $totalMembersForex ?></h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <div class="chart-wrapper mt-1">
                                                            <canvas id="profitchart"
                                                                class="h-8 w-9 chart-dropshadow"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="text-muted fs-12"><span class="text-green"><i
                                                            class="fe fe-arrow-up-circle text-green"></i> 0.9%</span>
                                                    Last 9 days</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h6 class="">Crypto and Forex Members</h6>
                                                        <h2 class="mb-0 number-font"><?= $totalMembersCryptoAndForex ?></h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <div class="chart-wrapper mt-1">
                                                            <canvas id="costchart"
                                                                class="h-8 w-9 chart-dropshadow"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="text-muted fs-12"><span class="text-warning"><i
                                                            class="fe fe-arrow-up-circle text-warning"></i> 0.6%</span>
                                                    Last year</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               </div>
                            
                        </div>
                       
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Members</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex mx-auto text-center justify-content-center mb-4">
                                            <div class="d-flex text-center justify-content-center me-3"><span
                                                    class="dot-label bg-primary my-auto"></span>Total Members</div>
                                           <div class="d-flex text-center justify-content-center me-3"><span
                                                    class="dot-label bg-primary my-auto"style="background: #299e48!important;"></span>Crypto Members</div>
                                                     <div class="d-flex text-center justify-content-center me-3"><span
                                                    class="dot-label bg-primary my-auto"style="background: #05c3fb!important;"></span>Forex Members</div>  
                                                    <div class="d-flex text-center justify-content-center me-3"><span
                                                    class="dot-label bg-primary my-auto"style="background: #ed2024!important;"></span>Crypto & Forex Members</div>
                                        </div>
                                        <div class="chartjs-wrapper-demo">
                                            <canvas id="transactions" class="chart-dropshadow"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                 
                    
                    <!<!-- members revenue -->
              
                     
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h6 class="">Total Subscriptions Revenue</h6>
                                                        <h2 class="mb-0 number-font"><?= $totalProfits ?>$</h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <div class="chart-wrapper mt-1">
                                                            <canvas id="saleschart"
                                                                class="h-8 w-9 chart-dropshadow"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="text-muted fs-12"><span class="text-secondary"><i
                                                            class="fe fe-arrow-up-circle  text-secondary"></i> 5%</span>
                                                    Last week</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h6 class="">Crypto Sybscriptions Revnue</h6>
                                                        <h2 class="mb-0 number-font"><?= $totalProfitsCrypto ?>$</h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <div class="chart-wrapper mt-1">
                                                            <canvas id="leadschart"
                                                                class="h-8 w-9 chart-dropshadow"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="text-muted fs-12"><span class="text-pink"><i
                                                            class="fe fe-arrow-down-circle text-pink"></i> 0.75%</span>
                                                    Last 6 days</span>
                                            </div>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                               <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                                <div class="row">
                                      <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h6 class="">Forex Subscriptions Revenue</h6>
                                                        <h2 class="mb-0 number-font"><?= $totalProfitsForex ?>$</h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <div class="chart-wrapper mt-1">
                                                            <canvas id="profitchart"
                                                                class="h-8 w-9 chart-dropshadow"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="text-muted fs-12"><span class="text-green"><i
                                                            class="fe fe-arrow-up-circle text-green"></i> 0.9%</span>
                                                    Last 9 days</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h6 class="">Crypto & Forex Subscriptions Revenue</h6>
                                                        <h2 class="mb-0 number-font"><?= $totalProfitsCryptoAndForex ?>$</h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <div class="chart-wrapper mt-1">
                                                            <canvas id="costchart"
                                                                class="h-8 w-9 chart-dropshadow"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="text-muted fs-12"><span class="text-warning"><i
                                                            class="fe fe-arrow-up-circle text-warning"></i> 0.6%</span>
                                                    Last year</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               </div>
                            
                        </div>
                       
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title"Revenue From Members</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex mx-auto text-center justify-content-center mb-4">
                                            <div class="d-flex text-center justify-content-center me-3"><span
                                                    class="dot-label bg-primary my-auto"></span>Total Members</div>
                                           <div class="d-flex text-center justify-content-center me-3"><span
                                                    class="dot-label bg-primary my-auto"style="background: #299e48!important;"></span>Crypto Members</div>
                                                     <div class="d-flex text-center justify-content-center me-3"><span
                                                    class="dot-label bg-primary my-auto"style="background: #05c3fb!important;"></span>Forex Members</div>  
                                                    <div class="d-flex text-center justify-content-center me-3"><span
                                                    class="dot-label bg-primary my-auto"style="background: #ed2024!important;"></span>Crypto & Forex Members</div>
                                        </div>
                                        <div class="chartjs-wrapper-demo">
                                            <canvas id="membersrevenue" class="chart-dropshadow"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                 
                    
                    
                    <!-- crypto signals -->
                    
                     
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h6 class="">Crypto Signals</h6>
                                                        <h2 class="mb-0 number-font">   <?= Utils::getSignalCryptoCountByUserId($userId) ?></h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <div class="chart-wrapper mt-1">
                                                            <canvas id="saleschart"
                                                                class="h-8 w-9 chart-dropshadow"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="text-muted fs-12"><span class="text-secondary"><i
                                                            class="fe fe-arrow-up-circle  text-secondary"></i> 5%</span>
                                                    Last week</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h6 class="">Won Crypto Signals</h6>
                                                        <h2 class="mb-0 number-font">   <?php
                                            $wonCryptoSignals = Utils::getSignalCryptoCountWinByUserId($userId);
                                            echo $wonCryptoSignals;
                                            ?></h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <div class="chart-wrapper mt-1">
                                                            <canvas id="leadschart"
                                                                class="h-8 w-9 chart-dropshadow"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="text-muted fs-12"><span class="text-pink"><i
                                                            class="fe fe-arrow-down-circle text-pink"></i> 0.75%</span>
                                                    Last 6 days</span>
                                            </div>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                               <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                                <div class="row">
                                      <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h6 class="">Loss Crypto Signals</h6>
                                                        <h2 class="mb-0 number-font">  <?= Utils::getSignalCryptoCountLossByUserId($userId) ?></h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <div class="chart-wrapper mt-1">
                                                            <canvas id="profitchart"
                                                                class="h-8 w-9 chart-dropshadow"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="text-muted fs-12"><span class="text-green"><i
                                                            class="fe fe-arrow-up-circle text-green"></i> 0.9%</span>
                                                    Last 9 days</span>
                                            </div>
                                        </div>
                                    </div>
                                  
                                </div>
                               </div>
                            
                        </div>
                       
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Crypto Siganls Analytics</h3>
                                    </div>
                                 <div class="card-body">
                                        <div class="d-flex mx-auto text-center justify-content-center mb-4">
                                            <div class="d-flex text-center justify-content-center me-3"><span
                                                    class="dot-label bg-primary my-auto"></span>Total Crypto Signals</div>
                                           <div class="d-flex text-center justify-content-center me-3"><span
                                                    class="dot-label bg-primary my-auto"style="background: #299e48!important;"></span>Won Signals</div>
                                                     <div class="d-flex text-center justify-content-center me-3"><span
                                                    class="dot-label bg-primary my-auto"style="background: #05c3fb!important;"></span>Loss Signals </div>  
                                                  
                                        </div>
                                        <div class="chartjs-wrapper-demo">
                                            <canvas id="cryptosignals" class="chart-dropshadow"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    
                    <!-- crypto percentage -->
                    
                         <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h6 class="">Net Crypto Signals Profit</h6>
                                                        <h2 class="mb-0 number-font">   <?= Utils::getSignalCryptoProfitByUserId($userId) ?></h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <div class="chart-wrapper mt-1">
                                                            <canvas id="saleschart"
                                                                class="h-8 w-9 chart-dropshadow"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="text-muted fs-12"><span class="text-secondary"><i
                                                            class="fe fe-arrow-up-circle  text-secondary"></i> 5%</span>
                                                    Last week</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h6 class="">Won Crypto Signals Profit</h6>
                                                        <h2 class="mb-0 number-font">   <?php
                                            $wonCryptoSignals = Utils::getSignalCryptoProfitWonByUserId($userId);
                                            echo $wonCryptoSignals;
                                            ?></h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <div class="chart-wrapper mt-1">
                                                            <canvas id="leadschart"
                                                                class="h-8 w-9 chart-dropshadow"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="text-muted fs-12"><span class="text-pink"><i
                                                            class="fe fe-arrow-down-circle text-pink"></i> 0.75%</span>
                                                    Last 6 days</span>
                                            </div>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                               <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                                <div class="row">
                                      <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h6 class="">Loss Crypto Signals Profit</h6>
                                                        <h2 class="mb-0 number-font">  <?= Utils::getSignalCryptoProfitLossByUserId($userId) ?></h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <div class="chart-wrapper mt-1">
                                                            <canvas id="profitchart"
                                                                class="h-8 w-9 chart-dropshadow"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="text-muted fs-12"><span class="text-green"><i
                                                            class="fe fe-arrow-up-circle text-green"></i> 0.9%</span>
                                                    Last 9 days</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h6 class="">Total Crypto Signals Profit</h6>
                                                        <h2 class="mb-0 number-font">   <?= Utils::getSignalCryptoProfitByUserId($userId) ?>%</h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <div class="chart-wrapper mt-1">
                                                            <canvas id="costchart"
                                                                class="h-8 w-9 chart-dropshadow"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="text-muted fs-12"><span class="text-warning"><i
                                                            class="fe fe-arrow-up-circle text-warning"></i> 0.6%</span>
                                                    Last year</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               </div>
                            
                        </div>
                       
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Crypto Siganls Profit Analytics</h3>
                                    </div>
                                 <div class="card-body">
                                        <div class="d-flex mx-auto text-center justify-content-center mb-4">
                                            <div class="d-flex text-center justify-content-center me-3"><span
                                                    class="dot-label bg-primary my-auto"></span>Net Crypto Profit</div>
                                           <div class="d-flex text-center justify-content-center me-3"><span
                                                    class="dot-label bg-primary my-auto"style="background: #299e48!important;"></span>Crypto Loss Profit</div>
                                                     <div class="d-flex text-center justify-content-center me-3"><span
                                                    class="dot-label bg-primary my-auto"style="background: #05c3fb!important;"></span>Crypto Won Profit</div>  
                                               
                                        </div>
                                        <div class="chartjs-wrapper-demo">
                                            <canvas id="cryptosignalsprofit" class="chart-dropshadow"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                 
                    <!-- forex signals -->
                    
                     
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h6 class="">Forex Signals</h6>
                                                        <h2 class="mb-0 number-font"> <?= Utils::getSignalForexCountByUserId($userId) ?></h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <div class="chart-wrapper mt-1">
                                                            <canvas id="saleschart"
                                                                class="h-8 w-9 chart-dropshadow"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="text-muted fs-12"><span class="text-secondary"><i
                                                            class="fe fe-arrow-up-circle  text-secondary"></i> 5%</span>
                                                    Last week</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h6 class="">Won Forex Signals</h6>
                                                        <h2 class="mb-0 number-font"> <?= Utils::getSignalForexCountWinByUserId($userId) ?></h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <div class="chart-wrapper mt-1">
                                                            <canvas id="leadschart"
                                                                class="h-8 w-9 chart-dropshadow"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="text-muted fs-12"><span class="text-pink"><i
                                                            class="fe fe-arrow-down-circle text-pink"></i> 0.75%</span>
                                                    Last 6 days</span>
                                            </div>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                               <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                                <div class="row">
                                      <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h6 class="">Loss Forex Signals</h6>
                                                        <h2 class="mb-0 number-font"> 
                                            <?= Utils::getSignalForexCountLossByUserId($userId) ?></h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <div class="chart-wrapper mt-1">
                                                            <canvas id="profitchart"
                                                                class="h-8 w-9 chart-dropshadow"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="text-muted fs-12"><span class="text-green"><i
                                                            class="fe fe-arrow-up-circle text-green"></i> 0.9%</span>
                                                    Last 9 days</span>
                                            </div>
                                        </div>
                                    </div>
                                      
                             
                                 
                                </div>
                               </div>
                            
                        </div>
                       
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Forex Siganls Analytics</h3>
                                    </div>
                                 <div class="card-body">
                                        <div class="d-flex mx-auto text-center justify-content-center mb-4">
                                            <div class="d-flex text-center justify-content-center me-3"><span
                                                    class="dot-label bg-primary my-auto"></span>Total Forex Signals</div>
                                           <div class="d-flex text-center justify-content-center me-3"><span
                                                    class="dot-label bg-primary my-auto"style="background: #299e48!important;"></span>Won Signals</div>
                                                     <div class="d-flex text-center justify-content-center me-3"><span
                                                    class="dot-label bg-primary my-auto"style="background: #05c3fb!important;"></span>Loss Signals </div>  
                                                  
                                        </div>
                                        <div class="chartjs-wrapper-demo">
                                            <canvas id="forexsignals" class="chart-dropshadow"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                    
                    
                    
                      
                    
                    
                    <!-- forex profit -->
                              <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h6 class="">Net Forex Signals Profit</h6>
                                                        <h2 class="mb-0 number-font"> <?= Utils::getSignalForexProfitByUserId($userId) ?></h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <div class="chart-wrapper mt-1">
                                                            <canvas id="saleschart"
                                                                class="h-8 w-9 chart-dropshadow"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="text-muted fs-12"><span class="text-secondary"><i
                                                            class="fe fe-arrow-up-circle  text-secondary"></i> 5%</span>
                                                    Last week</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h6 class="">Won Forex Signals Profit</h6>
                                                        <h2 class="mb-0 number-font"> <?= Utils::getSignalForexProfitWonByUserId($userId) ?></h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <div class="chart-wrapper mt-1">
                                                            <canvas id="leadschart"
                                                                class="h-8 w-9 chart-dropshadow"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="text-muted fs-12"><span class="text-pink"><i
                                                            class="fe fe-arrow-down-circle text-pink"></i> 0.75%</span>
                                                    Last 6 days</span>
                                            </div>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                               <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                                <div class="row">
                                      <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h6 class="">Loss Forex Signals Profit</h6>
                                                        <h2 class="mb-0 number-font"> 
                                            <?= Utils::getSignalForexProfitLossByUserId($userId) ?></h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <div class="chart-wrapper mt-1">
                                                            <canvas id="profitchart"
                                                                class="h-8 w-9 chart-dropshadow"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="text-muted fs-12"><span class="text-green"><i
                                                            class="fe fe-arrow-up-circle text-green"></i> 0.9%</span>
                                                    Last 9 days</span>
                                            </div>
                                        </div>
                                    </div>
                                      
                             
                                 
                                </div>
                               </div>
                            
                        </div>
                       
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Forex Siganls Profit Analytics</h3>
                                    </div>
                                 <div class="card-body">
                                        <div class="d-flex mx-auto text-center justify-content-center mb-4">
                                            <div class="d-flex text-center justify-content-center me-3"><span
                                                    class="dot-label bg-primary my-auto"></span>Net Forex Profit</div>
                                           <div class="d-flex text-center justify-content-center me-3"><span
                                                    class="dot-label bg-primary my-auto"style="background: #299e48!important;"></span>Forex Loss Profit</div>
                                                     <div class="d-flex text-center justify-content-center me-3"><span
                                                    class="dot-label bg-primary my-auto"style="background: #05c3fb!important;"></span>Forex Won Profit </div>  
                                                  
                                        </div>
                                        <div class="chartjs-wrapper-demo">
                                            <canvas id="forexsignalsprofit" class="chart-dropshadow"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                 

                    
                
       
      

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

</div>
 <?php JSRegister::begin(); ?>
<script>










    $.ajax({
    url: '<?php echo Url::toRoute("/my-api/get-users-stat-dashboard") ?>',
        type: "POST",
        data: {
            'userId': '<?= Yii::$app->user->id ?>',
        },
        success: function (data) {

 var resultMembers = data["dataMembers"];
                var labelsMembers = data["labelsMembers"];
                var resultMembers0 = data["dataMembers0"];
                var labelsMembers0 = data["labelsMembers0"];
                var dataSubscriptions = data["dataSubscriptions"];
                var labelsubscriptions = data["labelsubscriptions"];
                var dataSubscriptions10 = data["dataSubscriptions10"];
                var labelsubscriptions10 = data["labelsubscriptions10"];
                var CryptoMembers = data["CryptoMembers"];
                var forexMembers = data["forexMembers"];
                var forexandcryptoMembers = data["forexandcryptoMembers"];
                var cryptomemberSubscriptions = data["cryptomemberSubscriptions"];
                var forexmemberSubscriptions = data["forexmemberSubscriptions"];
                var cryptoforexmemberSubscriptions = data["cryptoforexmemberSubscriptions"];
                       var profitCrpto = data["profitCrpto"];
//            var profitCrpto =  data["resultWinPercentage"] - data["resultLossPercentage"];
                var resultSignals = data["resultSignals"];
                var resultSignalsForex = data["resultSignalsForex"];
                var labelsForexSignals = data["labelsForexSignals"];
                var resultLossForexSignals = data["resultLossForexSignals"];
                var resultWonForexSignals = data["resultWonForexSignals"];
            var resultWonCryptoSignals = data["resultWonCryptoSignals"];
            var resultLossCryptoSignals = data["resultLossCryptoSignals"];
            var labelsCryptoSignals = data["labelsCryptoSignals"];
            var resultWinForex = data["resultWinForex"];
            var resultLossForex = data["$resultLossForex"];
            var resultLossCrypto = data["resultLossCrypto"];
            var resultWinCrypto = data["resultWinCrypto"];
            var profitForex = data["profitForex"];
            
                

       // TRANSACTIONS
  
 var ctx = document.getElementById("transactions");
      ctx.height = "330";
    var myCanvasContext = ctx.getContext("2d");
    var gradientStroke1 = myCanvasContext.createLinearGradient(0, 80, 0, 280);
    gradientStroke1.addColorStop(0, hexToRgba(myVarVal, 0.8) || 'rgba(108, 95, 252, 0.8)');
    gradientStroke1.addColorStop(1, hexToRgba(myVarVal, 0.2) || 'rgba(108, 95, 252, 0.2) ');

    var gradientStroke2 = myCanvasContext.createLinearGradient(0, 80, 0, 280);
    gradientStroke2.addColorStop(0, hexToRgba(myVarVal1, 0.8) || 'rgba(5, 195, 251, 0.8)');
    gradientStroke2.addColorStop(1, hexToRgba(myVarVal1, 0.8) || 'rgba(5, 195, 251, 0.2) ');
    document.getElementById('transactions').innerHTML = ''; 
   
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labelsMembers0,
            datasets: [{
                label: "Total Members",
                borderColor: "#6c5ffc",
                borderWidth: "3",
                backgroundColor: "rgba(108, 95, 252, .1)",
                data: resultMembers0
            }, {
                label: "Crypto",
                borderColor: "#299e48",
                borderWidth: "3",
                backgroundColor: "transparent",
                pointHighlightStroke: "rgba(5, 195, 251 ,1)",
                data: CryptoMembers
            }, {
                label: "Forex",
                borderColor: "rgba(5, 195, 251 ,0.9)",
                borderWidth: "3",
                backgroundColor: "transparent",
                pointHighlightStroke: "rgba(5, 195, 251 ,1)",
                data: forexMembers
            }
            , {
                label: "Crypto & Forex",
                borderColor: "#ed2024",
                borderWidth: "3",
                backgroundColor: "transparent",
                pointHighlightStroke: "rgba(5, 195, 251 ,1)",
                data: forexandcryptoMembers
            }
        
                
                
                ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            tooltips: {
                mode: 'index',
                intersect: true
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    ticks: {
                        fontColor: "#9ba6b5",
                    },
                    gridLines: {
                        color: 'transparent'
                    }
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fontColor: "#9ba6b5",
                    },
                    gridLines: {
                        color: 'rgba(119, 119, 142, 0.2)'
                    },
                }]
            },
            legend: {
               	display: false
            },
        }
    });
 ///////////////////////
 //
  var membersrevenue = document.getElementById("membersrevenue");
      membersrevenue.height = "330";
    var membersrevenueContext = membersrevenue.getContext("2d");
    var gradientStroke1 = membersrevenueContext.createLinearGradient(0, 80, 0, 280);
    gradientStroke1.addColorStop(0, hexToRgba(myVarVal, 0.8) || 'rgba(108, 95, 252, 0.8)');
    gradientStroke1.addColorStop(1, hexToRgba(myVarVal, 0.2) || 'rgba(108, 95, 252, 0.2) ');

    var gradientStroke2 = membersrevenueContext.createLinearGradient(0, 80, 0, 280);
    gradientStroke2.addColorStop(0, hexToRgba(myVarVal1, 0.8) || 'rgba(5, 195, 251, 0.8)');
    gradientStroke2.addColorStop(1, hexToRgba(myVarVal1, 0.8) || 'rgba(5, 195, 251, 0.2) ');
    document.getElementById('membersrevenue').innerHTML = ''; 
   
    var myChart = new Chart(membersrevenue, {
        type: 'line',
        data: {
            labels: labelsubscriptions10,
            datasets: [{
                label: "Total Members",
                borderColor: "#6c5ffc",
                borderWidth: "3",
                backgroundColor: "rgba(108, 95, 252, .1)",
                data: dataSubscriptions10
            }, {
                label: "Crypto",
                borderColor: "#299e48",
                borderWidth: "3",
                backgroundColor: "transparent",
                pointHighlightStroke: "rgba(5, 195, 251 ,1)",
                data: cryptomemberSubscriptions
            }, {
                label: "Forex",
                borderColor: "rgba(5, 195, 251 ,0.9)",
                borderWidth: "3",
                backgroundColor: "transparent",
                pointHighlightStroke: "rgba(5, 195, 251 ,1)",
                data: forexmemberSubscriptions
            }
            , {
                label: "Crypto & Forex",
                borderColor: "#ed2024",
                borderWidth: "3",
                backgroundColor: "transparent",
                pointHighlightStroke: "rgba(5, 195, 251 ,1)",
                data: cryptoforexmemberSubscriptions
            }
        
                
                
                ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            tooltips: {
                mode: 'index',
                intersect: true
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    ticks: {
                        fontColor: "#9ba6b5",
                    },
                    gridLines: {
                        color: 'transparent'
                    }
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fontColor: "#9ba6b5",
                    },
                    gridLines: {
                        color: 'rgba(119, 119, 142, 0.2)'
                    },
                }]
            },
            legend: {
               	display: false
            },
        }
    });
 ////////////////////////
  var cryptosignals = document.getElementById("cryptosignals");
      cryptosignals.height = "330";
    var cryptosignalsContext = cryptosignals.getContext("2d");
    var gradientStroke1 = cryptosignalsContext.createLinearGradient(0, 80, 0, 280);
    gradientStroke1.addColorStop(0, hexToRgba(myVarVal, 0.8) || 'rgba(108, 95, 252, 0.8)');
    gradientStroke1.addColorStop(1, hexToRgba(myVarVal, 0.2) || 'rgba(108, 95, 252, 0.2) ');

    var gradientStroke2 = cryptosignalsContext.createLinearGradient(0, 80, 0, 280);
    gradientStroke2.addColorStop(0, hexToRgba(myVarVal1, 0.8) || 'rgba(5, 195, 251, 0.8)');
    gradientStroke2.addColorStop(1, hexToRgba(myVarVal1, 0.8) || 'rgba(5, 195, 251, 0.2) ');
    document.getElementById('membersrevenue').innerHTML = ''; 
   
    var myChart = new Chart(cryptosignals, {
        type: 'line',
        data: {
            labels: labelsCryptoSignals,
            datasets: [{
                label: "Total Members",
                borderColor: "#6c5ffc",
                borderWidth: "3",
                backgroundColor: "rgba(108, 95, 252, .1)",
                data: resultSignals
            }, {
                label: "Crypto",
                borderColor: "#299e48",
                borderWidth: "3",
                backgroundColor: "transparent",
                pointHighlightStroke: "rgba(5, 195, 251 ,1)",
                data: resultWonCryptoSignals
            }, {
                label: "Forex",
                borderColor: "rgba(5, 195, 251 ,0.9)",
                borderWidth: "3",
                backgroundColor: "transparent",
                pointHighlightStroke: "rgba(5, 195, 251 ,1)",
                data: resultLossCryptoSignals
            }
            , 
                
                
                ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            tooltips: {
                mode: 'index',
                intersect: true
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    ticks: {
                        fontColor: "#9ba6b5",
                    },
                    gridLines: {
                        color: 'transparent'
                    }
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fontColor: "#9ba6b5",
                    },
                    gridLines: {
                        color: 'rgba(119, 119, 142, 0.2)'
                    },
                }]
            },
            legend: {
               	display: false
            },
        }
    });
 //////
     var cryptosignalsprofit = document.getElementById("cryptosignalsprofit");
      cryptosignalsprofit.height = "330";
    var cryptosignalsprofitContext = cryptosignalsprofit.getContext("2d");
    var gradientStroke1 = cryptosignalsprofitContext.createLinearGradient(0, 80, 0, 280);
    gradientStroke1.addColorStop(0, hexToRgba(myVarVal, 0.8) || 'rgba(108, 95, 252, 0.8)');
    gradientStroke1.addColorStop(1, hexToRgba(myVarVal, 0.2) || 'rgba(108, 95, 252, 0.2) ');

    var gradientStroke2 = cryptosignalsprofitContext.createLinearGradient(0, 80, 0, 280);
    gradientStroke2.addColorStop(0, hexToRgba(myVarVal1, 0.8) || 'rgba(5, 195, 251, 0.8)');
    gradientStroke2.addColorStop(1, hexToRgba(myVarVal1, 0.8) || 'rgba(5, 195, 251, 0.2) ');
    document.getElementById('membersrevenue').innerHTML = ''; 
   
    var myChart = new Chart(cryptosignalsprofit, {
        type: 'line',
        data: {
            labels: labelsCryptoSignals,
            datasets: [{
                label: "Net Crypto Profit",
                borderColor: "#6c5ffc",
                borderWidth: "3",
                backgroundColor: "rgba(108, 95, 252, .1)",
                data: profitCrpto
            }, {
                label: "Crypto Loss Profit",
                borderColor: "#299e48",
                borderWidth: "3",
                backgroundColor: "transparent",
                pointHighlightStroke: "rgba(5, 195, 251 ,1)",
                data: resultLossCrypto
            }, {
                label: "Crypto Won Profit",
                borderColor: "rgba(5, 195, 251 ,0.9)",
                borderWidth: "3",
                backgroundColor: "transparent",
                pointHighlightStroke: "rgba(5, 195, 251 ,1)",
                data: resultWinCrypto
            }
            , 
                
                
                ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            tooltips: {
                mode: 'index',
                intersect: true
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    ticks: {
                        fontColor: "#9ba6b5",
                    },
                    gridLines: {
                        color: 'transparent'
                    }
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fontColor: "#9ba6b5",
                    },
                    gridLines: {
                        color: 'rgba(119, 119, 142, 0.2)'
                    },
                }]
            },
            legend: {
               	display: false
            },
        }
    });
     /////
     
//     forexsignals
 var forexsignals = document.getElementById("forexsignals");
      forexsignals.height = "330";
    var forexsignalsContext = forexsignals.getContext("2d");
    var gradientStroke1 = forexsignalsContext.createLinearGradient(0, 80, 0, 280);
    gradientStroke1.addColorStop(0, hexToRgba(myVarVal, 0.8) || 'rgba(108, 95, 252, 0.8)');
    gradientStroke1.addColorStop(1, hexToRgba(myVarVal, 0.2) || 'rgba(108, 95, 252, 0.2) ');

    var gradientStroke2 = forexsignalsContext.createLinearGradient(0, 80, 0, 280);
    gradientStroke2.addColorStop(0, hexToRgba(myVarVal1, 0.8) || 'rgba(5, 195, 251, 0.8)');
    gradientStroke2.addColorStop(1, hexToRgba(myVarVal1, 0.8) || 'rgba(5, 195, 251, 0.2) ');
    document.getElementById('forexsignals').innerHTML = ''; 
   
    var myChart = new Chart(forexsignals, {
        type: 'line',
        data: {
            labels: labelsForexSignals,
            datasets: [{
                label: "Total Forex Signals",
                borderColor: "#6c5ffc",
                borderWidth: "3",
                backgroundColor: "rgba(108, 95, 252, .1)",
                data: resultSignalsForex
            }, {
                label: "Won Forex Signals",
                borderColor: "#299e48",
                borderWidth: "3",
                backgroundColor: "transparent",
                pointHighlightStroke: "rgba(5, 195, 251 ,1)",
                data: resultWonForexSignals
            }, {
                label: "Loss Forex Signals",
                borderColor: "rgba(5, 195, 251 ,0.9)",
                borderWidth: "3",
                backgroundColor: "transparent",
                pointHighlightStroke: "rgba(5, 195, 251 ,1)",
                data: resultLossForexSignals
            }
            , 
                
                
                ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            tooltips: {
                mode: 'index',
                intersect: true
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    ticks: {
                        fontColor: "#9ba6b5",
                    },
                    gridLines: {
                        color: 'transparent'
                    }
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fontColor: "#9ba6b5",
                    },
                    gridLines: {
                        color: 'rgba(119, 119, 142, 0.2)'
                    },
                }]
            },
            legend: {
               	display: false
            },
        }
    });
    
    
    //     forexsignals profit
 var forexsignalsprofit = document.getElementById("forexsignalsprofit");
      forexsignalsprofit.height = "330";
    var forexsignalsprofitContext = forexsignalsprofit.getContext("2d");
    var gradientStroke1 = forexsignalsprofitContext.createLinearGradient(0, 80, 0, 280);
    gradientStroke1.addColorStop(0, hexToRgba(myVarVal, 0.8) || 'rgba(108, 95, 252, 0.8)');
    gradientStroke1.addColorStop(1, hexToRgba(myVarVal, 0.2) || 'rgba(108, 95, 252, 0.2) ');

    var gradientStroke2 = forexsignalsprofitContext.createLinearGradient(0, 80, 0, 280);
    gradientStroke2.addColorStop(0, hexToRgba(myVarVal1, 0.8) || 'rgba(5, 195, 251, 0.8)');
    gradientStroke2.addColorStop(1, hexToRgba(myVarVal1, 0.8) || 'rgba(5, 195, 251, 0.2) ');
    document.getElementById('forexsignals').innerHTML = ''; 
   
    var myChart = new Chart(forexsignalsprofit, {
        type: 'line',
        data: {
            labels: labelsForexSignals,
            datasets: [{
                label: "Total Forex Signals",
                borderColor: "#6c5ffc",
                borderWidth: "3",
                backgroundColor: "rgba(108, 95, 252, .1)",
                data: profitForex
            }, {
                label: "Won Forex Signals",
                borderColor: "#299e48",
                borderWidth: "3",
                backgroundColor: "transparent",
                pointHighlightStroke: "rgba(5, 195, 251 ,1)",
                data: resultWinForex
            }, {
                label: "Loss Forex Signals",
                borderColor: "rgba(5, 195, 251 ,0.9)",
                borderWidth: "3",
                backgroundColor: "transparent",
                pointHighlightStroke: "rgba(5, 195, 251 ,1)",
                data: resultLossForex
            }
            , 
                
                
                ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            tooltips: {
                mode: 'index',
                intersect: true
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    ticks: {
                        fontColor: "#9ba6b5",
                    },
                    gridLines: {
                        color: 'transparent'
                    }
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fontColor: "#9ba6b5",
                    },
                    gridLines: {
                        color: 'rgba(119, 119, 142, 0.2)'
                    },
                }]
            },
            legend: {
               	display: false
            },
        }
    });

        
        },
        error: function (errormessage) {
            console.log("not working");
        }
    });

</script>

<?php JSRegister::end(); ?>
