package com.xiaojukeji.tools;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.FileReader;
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
        try {
            BufferedReader bufferedReader = new BufferedReader(new FileReader(fileName));
            prop.load(bufferedReader);
        } catch (IOException e) {
            throw new IllegalArgumentException("解析文件 " + fileName + " 错误,请检查文件是否存在或者格式是否正确。");
        }
        return prop;
    }

}
