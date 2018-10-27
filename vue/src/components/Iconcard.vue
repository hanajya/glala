<template>
    <Card :padding="0">
        <div class="h100">
            <Col class="full-height" :style="{ backgroundColor: bgColor, color: color}" span="8">
                <Row class="full-height" type="flex" align="middle" justify="center">
                    <Icon :type="iconType" :size="iconSize"></Icon>
                </Row>
            </Col>
            <Col span="16" class="full-height">
                <Row type="flex" align="middle" justify="center" class="full-height">
                    <slot name="content"></slot>
                </Row>
            </Col>
        </div>
    </Card>
</template>

<script>
export default {
    props: {
        bgColor: {
            type: String,
            default: '#2196f3'
        },
        color: {
            type: String,
            default: '#ffffff'
        },
        iconType: {
            type: String,
            default: 'android-person'
        },
        iconSize: {
            type: Number,
            default: 40
        }
    }
};
</script>