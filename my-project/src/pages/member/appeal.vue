<template>
	<div class="member-appeal">
		<i-tabs :current="current" @change="handleChange">
		    <i-tab key="tab1" title="我的投诉"></i-tab>
		    <i-tab key="tab2" title="被投诉"></i-tab>
		</i-tabs>
		<i-cell-group>
			<i-cell is-link url="">
				<span class="ml10">
					<i-avatar src="https://i.loli.net/2017/08/21/599a521472424.jpg" size="default"></i-avatar>
				</span>
				<span class="inline-block ml5">
					群名称
				</span>
				<span class="inline-block fr gray mt5">标签</span>
			</i-cell>
			<i-cell is-link url="">
				<span class="ml10">
					<i-avatar src="https://i.loli.net/2017/08/21/599a521472424.jpg" size="default"></i-avatar>
				</span>
				<span class="inline-block ml5">
					群名称
				</span>
				<span class="inline-block fr gray mt5">标签</span>
			</i-cell>
			<i-cell is-link url="">
				<span class="ml10">
					<i-avatar src="https://i.loli.net/2017/08/21/599a521472424.jpg" size="default"></i-avatar>
				</span>
				<span class="inline-block ml5">
					群名称
				</span>
				<span class="inline-block fr gray mt5">标签</span>
			</i-cell>
			<i-cell is-link url="">
				<span class="ml10">
					<i-avatar src="https://i.loli.net/2017/08/21/599a521472424.jpg" size="default"></i-avatar>
				</span>
				<span class="inline-block ml5">
					群名称
				</span>
				<span class="inline-block fr gray mt5">标签</span>
			</i-cell>
			<i-cell></i-cell>
		</i-cell-group>
	</div>
</template>
<script>
	export default {
		components: {

		},
		data () {
			return {
				current: 'tab1',
			}
		},
		methods: {
			handleChange (detail) {
				this.current = detail.target.key
			}
		}
	}
</script>