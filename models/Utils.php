<?php

namespace app\models;

class Utils {

    public static $FOREX_SIGNAL_WIN = 1;
    public static $CRYPTO_SIGNAL_WIN = 1;

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

}
