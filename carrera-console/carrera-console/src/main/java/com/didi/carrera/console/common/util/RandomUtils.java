package com.didi.carrera.console.common.util;

import java.util.List;
import java.util.Map;
import java.util.Set;
import java.util.concurrent.ThreadLocalRandom;

public class RandomUtils {

    public static ThreadLocalRandom getRandom() {
        return ThreadLocalRandom.current();
    }

    public static int getRandomInt(int max) {
        return getRandom().nextInt(max);
    }

    public static int getRandomInt(int min, int max) {
        return getRandom().nextInt(max - min + 1) + min;
    }

    public static long getRandomLong(long max) {
        return getRandom().nextLong(max);
    }

    public static <E> E getRandomElement(E[] array) {
        return array[getRandomInt(array.length)];
    }

    public static <E> E getRandomElement(List<E> list) {
        return list.get(getRandomInt(list.size()));
    }

    public static <E> E getRandomElement(Set<E> set) {
        int rn = getRandomInt(set.size());
        int i = 0;
        for (E e : set) {
            if (i == rn) {
                return e;
            }
            i++;
        }
        return null;
    }

    public static <K, V> K getRandomKeyFromMap(Map<K, V> map) {
        int rn = getRandomInt(map.size());
        int i = 0;
        for (K key : map.keySet()) {
            if (i == rn) {
                return key;
            }
            i++;
        }
        return null;
    }

    public static <K, V> V getRandomValueFromMap(Map<K, V> map) {
        int rn = getRandomInt(map.size());
        int i = 0;
        for (V value : map.values()) {
            if (i == rn) {
                return value;
            }
            i++;
        }
        return null;
    }

    public static String getRandNumber(int n) {
        String rn = "";
        if (n > 0 && n < 10) {
            //Random r = new Random();
            StringBuffer str = new StringBuffer();
            for (int i = 0; i < n; i++) {
                str.append('9');
            }
            int num = Integer.parseInt(str.toString());
            while (rn.length() < n) {
                rn = String.valueOf(ThreadLocalRandom.current().nextInt(num));
            }
        } else {
            rn = "0";
        }
        return rn;
    }
}