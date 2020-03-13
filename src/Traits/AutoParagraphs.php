<?php


namespace Riclep\Storyblok\Traits;

trait AutoParagraphs
{
	protected $autoParagraphs = [];

	private function autoParagraphs() {
		if ($this->autoParagraphs && count($this->autoParagraphs)) {
			foreach ($this->autoParagraphs as $field) {
				if ($this->content->has($field)) {
					$this->content[$field . '_html'] = $this->autoParagraph($this->content[$field]);
				}
			}
		}
	}

	private function autoParagraph($text) {
		$paragraphs = explode("\n", $text);
		return '<p>' . implode('</p><p>', array_filter($paragraphs)) . '</p>';
	}
}