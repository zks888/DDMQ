package com.chopper.protocol;

import com.alibaba.fastjson.JSONObject;
import com.chopper.tools.PropertiesTools;

import java.util.HashMap;
import java.util.Properties;
import java.util.List;
import java.util.Arrays;

public class ChopperConfiguration extends JSONObject {
    private static final String CHOPPER = "notice.properties";

    private static final HashMap<String, Object> CONF_STORE = new HashMap<>();

    static {
        if (CONF_STORE.size() == 0) {
            Properties properties = PropertiesTools.getProperties(CHOPPER);
            for (Entry<Object, Object> objectEntry : properties.entrySet()) {
                CONF_STORE.put(objectEntry.getKey().toString().toLowerCase(), objectEntry.getValue());
            }
        }
    }

    /***
     * 系统时区
     */
    public static String timeZone() {
        return get("time.zone", "GMT+8");
    }

    /***
     *是否开启报警
     */
    public static boolean warningOn() {
        return getBoolean("warning.on", true);
    }

    /***
     * 邮件发送服务器地址
     */
    public static String mailServerHost() {
        return get("mail.server.host");
    }

    /***
     * 邮件发送服务器端口
     */
    public static int mailServerPort() {
        return getInt("mail.server.port", 465);
    }

    /***
     * 是否开启ssl
     */
    public static Boolean mailSmtpSslEnable() {
        return getBoolean("mail.smtp.ssl.enable", true);
    }

    /***
     * 邮件发送者
     */
    public static String mailNickname() {
        return get("mail.nickname");
    }

    /***
     * 邮件发送者
     */
    public static String mailUsername() {
        return get("mail.username");
    }

    /***
     * 邮件发送者密码
     */
    public static String mailPassword() {
        return get("mail.password");
    }

    /***
     * 获取邮件标题
     */
    public static String mailSubject(String group) {
        return get(String.format("%s.subject", group));
    }

    /***
     * 获取邮件收件人
     */
    public static List<String> mailReceivers(String group) {
        String receivers = get(String.format("%s.receivers", group));
        String[] receiverArr = receivers.split(",");
        return Arrays.asList(receiverArr);
    }

    private static String get(String name, String defaultValue) {
        Object value = CONF_STORE.get(name);
        if (value == null) {
            if (defaultValue == null) {
                throw new RuntimeException(String.format("%s value not be null !", name));
            }
            return defaultValue;
        }
        return value.toString().trim();
    }

    private static String get(String name) {
        return get(name, null);
    }

    private static double getDouble(String name, double defaultValue) {
        return Double.parseDouble(get(name, String.valueOf(defaultValue)));
    }

    private static int getInt(String name, int defaultValue) {
        return Integer.parseInt(get(name, String.valueOf(defaultValue)));
    }

    private static Boolean getBoolean(String name, boolean defaultValue) {
        return Boolean.parseBoolean(get(name, String.valueOf(defaultValue)));
    }


    private static long getLong(String name, long defaultValue) {
        return Long.parseLong(get(name, String.valueOf(defaultValue)));
    }
}
