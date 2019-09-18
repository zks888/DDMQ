package com.chopper.tools;

import org.junit.Test;

public class TestSendMail {

    @Test
    public void sendEmail() {
        NoticeTools.sendEmail("consumer.lag.monitor", "服务很健康");
    }
}