<?php

namespace app\models;

class Utils {

    public static $FOREX_SIGNAL_WIN = 1;
    public static $CRYPTO_SIGNAL_WIN = 1;
    public static $FOREX_SIGNAL_LOSS = 2;
    public static $CRYPTO_SIGNAL_LOSS = 2;

    public static function getSignalForexCountByUserId($userId) {
        return ForexSignals::find()
                        ->where([
                            "user_id" => $userId
                        ])->count();
    }

    public static function getSignalForexCountWinByUserId($userId) {
        return ForexSignals::find()
                        ->where([
                            "user_id" => $userId,
                            "result" => Utils::$FOREX_SIGNAL_WIN
                        ])->count();
    }

    public static function getSignalForexCountLossByUserId($userId) {
        return ForexSignals::find()
                        ->where([
                            "user_id" => $userId,
                            "result" => Utils::$FOREX_SIGNAL_LOSS
                        ])->count();
    }

    public static function getSignalForexProfitByUserId($userId) {
        $forexSignals = ForexSignals::find()
                        ->select("COALESCE(SUM(case when forex_signals.result = 1 then percentage else -percentage end),0) as `percentage`")
                        ->where([
                            "user_id" => $userId,
                        ])->all();
        if (sizeof($forexSignals)) {
            return $forexSignals[0]["percentage"];
        } else {
            return 0;
        }
    }

    public static function getSignalCryptoCountByUserId($userId) {
        return CryptoSignals::find()
                        ->where([
                            "user_id" => $userId
                        ])->count();
    }

    public static function getSignalCryptoCountWinByUserId($userId) {
        return CryptoSignals::find()
                        ->where([
                            "user_id" => $userId,
                            "result" => Utils::$CRYPTO_SIGNAL_WIN
                        ])->count();
    }

    public static function getSignalCryptoCountLossByUserId($userId) {
        return CryptoSignals::find()
                        ->where([
                            "user_id" => $userId,
                            "result" => Utils::$CRYPTO_SIGNAL_LOSS
                        ])->count();
    }

    public static function getSignalCryptoProfitByUserId($userId) {
        $cryptoSignals = CryptoSignals::find()
                        ->select("COALESCE(SUM(case when result = 1 then percentage else -percentage end),0) as `percentage`")
                        ->where([
                            "user_id" => $userId,
                           
                        ])->all();
        if (sizeof($cryptoSignals)) {
            return $cryptoSignals[0]["percentage"];
        } else {
            return 0;
        }
    }

}
