<?php

namespace app\models;

class Utils {

    public static $FOREX_SIGNAL_WIN = 1;
    public static $CRYPTO_SIGNAL_WIN = 1;
    public static $FOREX_SIGNAL_LOSS = 2;
    public static $CRYPTO_SIGNAL_LOSS = 2;

    public static function getSignalForexCountByUserId($userId, $from = null, $to = null) {
        return ForexSignals::find()
                        ->where([
                            "user_id" => $userId
                        ])
                        ->andFilterWhere(['>=', 'date', $from])
                        ->andFilterWhere(['<=', 'date', $to])
                        ->count();
    }

    public static function getSignalForexCountWinByUserId($userId, $from = null, $to = null) {
        return ForexSignals::find()
                        ->where([
                            "user_id" => $userId,
                            "result" => Utils::$FOREX_SIGNAL_WIN
                        ])->andFilterWhere(['>=', 'date', $from])
                        ->andFilterWhere(['<=', 'date', $to])->count();
    }

    public static function getSignalForexCountLossByUserId($userId, $from = null, $to = null) {
        return ForexSignals::find()
                        ->where([
                            "user_id" => $userId,
                            "result" => Utils::$FOREX_SIGNAL_LOSS
                        ])->andFilterWhere(['>=', 'date', $from])
                        ->andFilterWhere(['<=', 'date', $to])->count();
    }

    public static function getSignalForexProfitByUserId($userId, $from = null, $to = null) {
        $forexSignals = ForexSignals::find()
                        ->select("COALESCE(SUM(case when forex_signals.result = 1 then percentage else -percentage end),0) as `percentage`")
                        ->where([
                            "user_id" => $userId,
                        ])->andFilterWhere(['>=', 'date', $from])
                        ->andFilterWhere(['<=', 'date', $to])->all();
        if (sizeof($forexSignals)) {
            return $forexSignals[0]["percentage"];
        } else {
            return 0;
        }
    }

    public static function getSignalForexProfitWonByUserId($userId, $from = null, $to = null) {
        $forexSignals = ForexSignals::find()
                        ->select("COALESCE(SUM(case when forex_signals.result = 1 then percentage else 0 end),0) as `percentage`")
                        ->where([
                            "user_id" => $userId,
                        ])->andFilterWhere(['>=', 'date', $from])
                        ->andFilterWhere(['<=', 'date', $to])->all();
        if (sizeof($forexSignals)) {
            return $forexSignals[0]["percentage"];
        } else {
            return 0;
        }
    }

    public static function getSignalForexProfitLossByUserId($userId, $from = null, $to = null) {
        $forexSignals = ForexSignals::find()
                        ->select("COALESCE(SUM(case when forex_signals.result = 2 then percentage else 0 end),0) as `percentage`")
                        ->where([
                            "user_id" => $userId,
                        ])->andFilterWhere(['>=', 'date', $from])
                        ->andFilterWhere(['<=', 'date', $to])->all();
        if (sizeof($forexSignals)) {
            return $forexSignals[0]["percentage"];
        } else {
            return 0;
        }
    }

    public static function getSignalCryptoCountByUserId($userId, $from = null, $to = null) {
        return CryptoSignals::find()
                        ->where([
                            "user_id" => $userId
                        ])->andFilterWhere(['>=', 'date', $from])
                        ->andFilterWhere(['<=', 'date', $to])->count();
    }

    public static function getSignalCryptoCountWinByUserId($userId, $from = null, $to = null) {
        return CryptoSignals::find()
                        ->where([
                            "user_id" => $userId,
                            "result" => Utils::$CRYPTO_SIGNAL_WIN
                        ])->andFilterWhere(['>=', 'date', $from])
                        ->andFilterWhere(['<=', 'date', $to])->count();
    }

    public static function getSignalCryptoCountLossByUserId($userId, $from = null, $to = null) {
        return CryptoSignals::find()
                        ->where([
                            "user_id" => $userId,
                            "result" => Utils::$CRYPTO_SIGNAL_LOSS
                        ])->andFilterWhere(['>=', 'date', $from])
                        ->andFilterWhere(['<=', 'date', $to])->count();
    }

    public static function getSignalCryptoProfitByUserId($userId, $from = null, $to = null) {
        $cryptoSignals = CryptoSignals::find()
                        ->select("COALESCE(SUM(case when result = 1 then percentage else -percentage end),0) as `percentage`")
                        ->where([
                            "user_id" => $userId,
                        ])->andFilterWhere(['>=', 'date', $from])
                        ->andFilterWhere(['<=', 'date', $to])->all();
        if (sizeof($cryptoSignals)) {
            return $cryptoSignals[0]["percentage"];
        } else {
            return 0;
        }
    }

    public static function getSignalCryptoProfitWonByUserId($userId, $from = null, $to = null) {
        $cryptoSignals = CryptoSignals::find()
                        ->select("COALESCE(SUM(case when result = 1 then percentage else 0 end),0) as `percentage`")
                        ->where([
                            "user_id" => $userId,
                        ])->andFilterWhere(['>=', 'date', $from])
                        ->andFilterWhere(['<=', 'date', $to])->all();
        if (sizeof($cryptoSignals)) {
            return $cryptoSignals[0]["percentage"];
        } else {
            return 0;
        }
    }

    public static function getSignalCryptoProfitLossByUserId($userId, $from = null, $to = null) {
        $cryptoSignals = CryptoSignals::find()
                        ->select("COALESCE(SUM(case when result = 2 then percentage else 0 end),0) as `percentage`")
                        ->where([
                            "user_id" => $userId,
                        ])->andFilterWhere(['>=', 'date', $from])
                        ->andFilterWhere(['<=', 'date', $to])->all();
        if (sizeof($cryptoSignals)) {
            return $cryptoSignals[0]["percentage"];
        } else {
            return 0;
        }
    }

}
