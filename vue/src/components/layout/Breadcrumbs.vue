<template>
	<Breadcrumb v-if="$store.state.breadcrumb">
		<BreadcrumbItem>控制台</BreadcrumbItem>
	    <BreadcrumbItem v-for="(item, index) in $store.state.breadcrumb" :key="index">
	    	{{ item.label }}
	   	</BreadcrumbItem>
	</Breadcrumb>
</template>