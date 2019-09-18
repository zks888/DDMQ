package com.chopper.tools;

import java.io.BufferedReader;
import java.io.FileInputStream;
import java.io.IOException;
import java.io.InputStreamReader;
import java.util.Properties;

public class PropertiesTools {

    /**
     * 根据文件名获取classpath下的proterties配置文件
     *
     * @param fileName 文件名 xxx.properties
     * @return
     */
    public static Properties getProperties(String fileName) {
        Properties prop = new Properties();
        ClassLoader classLoader = Thread.currentThread().getContextClassLoader();
        if (classLoader == null) {
            classLoader = PropertiesTools.class.getClassLoader();
        }
        String sqlFile = classLoader.getResource(fileName).getFile();
        try {
            prop.load(new BufferedReader(new InputStreamReader(new FileInputStream(sqlFile), "UTF-8")));
        } catch (IOException e) {
            throw new IllegalArgumentException("解析文件 " + fileName + " 错误,请检查文件是否存在或者格式是否正确。");
        }
        return prop;
    }

}
