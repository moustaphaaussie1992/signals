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
        return ForexSignals::find()
                        ->where([
                            "user_id" => $userId,
                        ])->sum('percentage');
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
        return CryptoSignals::find()
                        ->where([
                            "user_id" => $userId,
                        ])->sum('percentage');
    }

}
